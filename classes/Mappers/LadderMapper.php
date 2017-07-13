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
     * @param int $minPara 1..10000
     * @param int $maxPara 1..10000
     * @param String $patterns csv string
     * @return \Entities\Ladder
     */
    public static function createObj($realm, $season, $hardcore, $index, $class, $min, $max, $minPara, $maxPara, $mark, $patterns, $patternsClanTag, $patternsClan) {
        $ladder = (new \Entities\Ladder())
            ->setRealm($realm)
            ->setSeason($season)
            ->setHardcore($hardcore)
            ->setIndex($index)
            ->setClass($class)
            ->setMin($min)
            ->setMax($max)
            ->setMinPara($minPara)
            ->setMaxPara($maxPara)
            ->setSearchMode($mark)
            ->setPatterns($patterns)
            ->setPatternsClanTag($patternsClanTag)
            ->setPatternsClan($patternsClan);
        $data = self::getApiDataWithToken(
                \Factories\BlizzardLadderApiUrlFactory::getUrl($realm, $season, $hardcore, $index, $class),
                true,
                SYS_LADDER_CACHE_LIFETIME);
        $ladder->setLastUpdate($data->last_update_time);
        self::addRanks($ladder, $data->row);
        return $ladder;
    }
    
    /**
     * 
     * @param \Entities\Ladder $ladder
     * @param StdObject $dataAll From json_decode
     */
    private static function addRanks(\Entities\Ladder $ladder, $dataAll) {
        $levelSum = 0; $pos = $ladder->getMin();
        $data = array_slice($dataAll, $ladder->getStartIndex(), $ladder->getLength());
        foreach($data as $row) {
            $rank = \Mappers\RankMapper::createObj($row); //create rank

            if($rank->getPos() != false) {  //fix empty position
                $pos = $rank->getPos();
            } else {
                $rank->setPos($pos);
            }
            
            // filter rank by paragon level
            if(\Validators\AbstractBattleNetValidator::validateInt($rank->getPlayer()->getParagon(),
                    $ladder->getMinPara(), $ladder->getMaxPara())) {
                $ladder->addRank( $rank );
                $levelSum += $rank->getLevel();
                self::search($ladder, $rank);
                self::searchClanTag($ladder, $rank);
                self::searchClan($ladder, $rank);
            }
        }
        $ladder->setAvgLevel($ladder->getCount() > 0 ? number_format($levelSum / $ladder->getCount(), 2) : 0);
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

    /**
     * Matches the rank to the search patterns
     * @param \Entities\Ladder $ladder
     * @param \Entities\Rank $rank
     */
    private static function searchClanTag(\Entities\Ladder $ladder, \Entities\Rank $rank) {
        if($ladder->hasSearchClanTag()) {
            foreach($ladder->getPatternsClanTag() as $pattern) {
                if(strpos(strtolower($rank->getPlayer()->getClanShort()), strtolower($pattern)) !== false) {
                    $rank->setMatch(true);
                    $ladder->addSearchResultClanTag($rank->getPlayer());
                }
            }
        }
    }

    /**
     * Matches the rank to the search patterns
     * @param \Entities\Ladder $ladder
     * @param \Entities\Rank $rank
     */
    private static function searchClan(\Entities\Ladder $ladder, \Entities\Rank $rank) {
        if($ladder->hasSearchClan()) {
            foreach($ladder->getPatternsClan() as $pattern) {
                if(strpos(strtolower($rank->getPlayer()->getClan()), strtolower($pattern)) !== false) {
                    $rank->setMatch(true);
                    $ladder->addSearchResultClan($rank->getPlayer());
                }
            }
        }
    }

}
