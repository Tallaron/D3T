<?php

namespace Mappers;

/**
 * Mapper for \Entities\Ladder
 */
abstract class LadderMapper extends AbstractMapper {
    
    /**
     * 
     * @param String $realm 'eu', 'us', ...
     * @param int $season 0,1
     * @param int $hardcore 0,1
     * @param int $index 1..MAX
     * @param String $class e.g. 'rift-barbarian'
     * @param int $min 1..1000
     * @param int $max 1..1000
     * @param String $patterns csv string
     * @return \Entities\Ladder
     */
    public static function createObj($realm, $season, $hardcore, $index, $class, $min, $max, $patterns) {
        $ladder = (new \Entities\Ladder())
            ->setRealm($realm)
            ->setSeason($season)
            ->setHardcore($hardcore)
            ->setIndex($index)
            ->setClass($class)
            ->setMin($min)
            ->setMax($max)
            ->setPatterns($patterns);
        $data = self::getApiDataWithToken(
                \Factories\BlizzardLadderApiUrlFactory::getUrl($realm, $season, $hardcore, $index, $class),
                true);
        $ladder->setLastUpdate($data->last_update_time);
        self::addRanks($ladder, $data->row);
        return $ladder;
    }
    
    /**
     * 
     * @param \Entities\Ladder $ladder
     * @param StdObject $data From json_decode
     */
    private static function addRanks(\Entities\Ladder $ladder, $data) {
        $levelSum = 0;
        $data = array_slice($data, $ladder->getStartIndex(), $ladder->getLength());
        foreach($data as $row) {
            $rank = \Mappers\RankMapper::createObj($row);
            $ladder->addRank( $rank );
            $levelSum += $rank->getLevel();
            self::search($ladder, $rank);
        }
        $ladder->setAvgLevel(number_format($levelSum / $ladder->getLength(), 2));
    }
    
    /**
     * Matches the rank to the search patterns
     * @param \Entities\Ladder $ladder
     * @param \Entities\Rank $rank
     */
    private static function search(\Entities\Ladder $ladder, \Entities\Rank $rank) {
        if($ladder->hasSearch()) {
            foreach($ladder->getPatterns() as $pattern) {
                if(strpos(strtolower($rank->getPlayer()->getName()), strtolower($pattern)) !== false) {
                    $rank->setMatch(true);
                    $ladder->addSearchResult($rank->getPlayer());
                }
            }
        }
    }

}
