<?php

namespace Mappers;

/**
 * Mapper for \Entities\Profile
 */
class ProfileMapper extends AbstractMapper {

    /**
     * 
     * @param String $realm Short realm tag, e.g. 'eu' or 'us'
     * @param String $bTag Battle#Tag
     * @param String $content Content switch key, e.g. 'hero' or 'overview'
     * @param type $contentId ContentId, e.g. heroId
     * @return \Entities\Profile
     */
    public static function createObj($realm, $bTag, $content, $contentId) {
        $profile = (new \Entities\Profile())
            ->setRealm($realm)
            ->setContent($content)
            ->setContentId($contentId);
        $data = self::getApiDataWithKey(
                \Factories\BlizzardProfileApiUrlFactory::getUrl($realm, $bTag),
                true,
                SYS_PROFILE_CACHE_LIFETIME);
        self::loadProfileInformation($profile, $data);
        self::loadHeroes($profile, $data);
        self::loadSeasons($profile, $data);
        self::calculateParagon($profile);
        return $profile;
    }
    
    
    
    
    
    private static function calculateParagon(\Entities\Profile $profile) {
        $pc = \Mappers\ParagonCalculationMapper::createObject(
                                            $profile->getParagon(),
                                            $profile->getParagonSeasonal());
        $profile->setParagonOverall( $pc->getOverallLevel() );
        $pc = \Mappers\ParagonCalculationMapper::createObject(
                                            $profile->getParagonHardcore(),
                                            $profile->getParagonSeasonalHardcore());
        $profile->setParagonHardcoreOverall( $pc->getOverallLevel() );
    }

    










    /**
     * 
     * @param \Entities\Profile $profile
     * @param StdObject $data From json_decode
     */
    private static function loadProfileInformation(\Entities\Profile $profile, $data) {
        $profile->setBTag( $data->battleTag )
            ->setLastUpdate( $data->lastUpdated )
            ->setClan( $data->guildName )
            ->setParagon( $data->paragonLevel )
            ->setParagonHardcore( $data->paragonLevelHardcore )
            ->setParagonSeasonal( $data->paragonLevelSeason )
            ->setParagonSeasonalHardcore( $data->paragonLevelSeasonHardcore )
            ->setLifeTimeKills( $data->kills->monsters )
            ->setEliteKills( $data->kills->elites );
        foreach($data->timePlayed as $key => $playedValue) {
            $profile->setPlayed($key, $playedValue);
            $profile->addPlayed($playedValue);
         }
    }

    /**
     * 
     * @param \Entities\Profile $profile
     * @param StdObject $data From json_decode
     */
    private static function loadHeroes(\Entities\Profile $profile, $data) {
        foreach($data->heroes as $heroData) {
            $hero = \Mappers\HeroMapper::createObj($heroData);
            $profile->addHero( $hero );
            
            if($profile->getContent() == 'hero' && $hero->getId() == $profile->getContentId()) {
                \Mappers\HeroMapper::addHeroDetails(
                        $hero,
                        self::getApiDataWithKey(
                                \Factories\BlizzardHeroApiUrlFactory::getUrl(
                                            $profile->getRealm(),
                                            $profile->getBTagMinus(),
                                            $hero->getId()),
                                true,
                                SYS_HERO_CACHE_LIFETIME));
                $profile->setHero($hero);
            }
        }
    }

    /**
     * 
     * @param \Entities\Profile $profile
     * @param StdObject $data From json_decode
     */
    private static function loadSeasons(\Entities\Profile $profile, $data) {
        foreach($data->seasonalProfiles as $season) {
            if($season->seasonId > 0) {
                $profile->addSeason(\Mappers\SeasonMapper::createObj($season) );
            }
        }
    }
    
}
