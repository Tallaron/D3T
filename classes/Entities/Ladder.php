<?php

namespace Entities;

/**
 * Data class for a Diablo 3 Ladder. Contains meta data and some sub
 * structures, e.g. collection of ranks.
 */
class Ladder {

    private $realm;
    private $season = 0;
    private $hardcore = 0;
    private $index;
    private $class = false;
    private $min;
    private $max;
    private $minPara;
    private $maxPara;
    private $searchMode;
    private $ranks = [];
    private $avgLevel = -1;
    private $patterns = [];
    private $patternsClanTag = [];
    private $patternsClan = [];
    private $results = [];
    private $resultsClanTag = [];
    private $resultsClan = [];
    private $lastUpdate;

    /**
     * If a search pattern match the players name, the player objects will
     * be put into the results collection.
     * @param \Entities\Player $player
     */
    public function addSearchResult(\Entities\Player $player) {
        $this->results[] = $player;
    }

    /**
     * If a search pattern match the clan tag, the player objects will
     * be put into the results collection.
     * @param \Entities\Player $player
     */
    public function addSearchResultClanTag(\Entities\Player $player) {
        $this->resultsClanTag[] = $player;
    }

    /**
     * If a search pattern match the clan name, the player objects will
     * be put into the results collection.
     * @param \Entities\Player $player
     */
    public function addSearchResultClan(\Entities\Player $player) {
        $this->resultsClan[] = $player;
    }

    /**
     * Puts a Rank object into the ladder.
     * @param \Entities\Rank $rank
     */
    public function addRank(\Entities\Rank $rank) {
        $this->ranks[] = $rank;
    }
    
    /**
     * Returns the determined index of the ranks collection according to
     * the choosen start position. Default is 1.
     * @return int
     */
    public function getStartIndex() {
        return $this->getMin()-1;
    }
    
    /**
     * Returns the number of ranks between start and end postion. Default is
     * 1000, based on default start of 1 and default end of 1000.
     * @return int
     */
    public function getLength() {
        return min(1000, $this->getMax() - $this->getMin() + 1);
    }
    
    /**
     * Returns the number of Ranks the ladder contains.
     * @return int
     */
    public function getCount() {
        return count($this->getRanks());
    }

    /**
     * Adds a search pattern string to the search pattern collection. The
     * collection array will be iterated later for in_array() searches.
     * @param String $pattern
     */
    public function addPattern($pattern) {
        $this->patterns[] = $pattern;
    }

    /**
     * Adds a search pattern string to the search pattern collection. The
     * collection array will be iterated later for in_array() searches.
     * @param String $pattern
     */
    public function addPatternClanTag($pattern) {
        $this->patternsClanTag[] = $pattern;
    }

    /**
     * Adds a search pattern string to the search pattern collection. The
     * collection array will be iterated later for in_array() searches.
     * @param String $pattern
     */
    public function addPatternClan($pattern) {
        $this->patternsClan[] = $pattern;
    }

    /**
     * Implodes the search pattern array into a csv string.
     * @return String
     */
    public function getSearchString() {
        return implode('; ', $this->getPatterns());
    }
    
    /**
     * Implodes the search pattern array into a csv string.
     * @return String
     */
    public function getSearchStringClanTag() {
        return implode('; ', $this->getPatternsClanTag());
    }
    
    /**
     * Implodes the search pattern array into a csv string.
     * @return String
     */
    public function getSearchStringClan() {
        return implode('; ', $this->getPatternsClan());
    }
    
    /**
     * Returns true if there were search patterns given to the ladder.
     * @return boolean
     */
    public function hasSearch() {
        return count($this->getPatterns()) > 0 ? true : false;
    }

    /**
     * Returns true if there were search patterns given to the ladder.
     * @return boolean
     */
    public function hasSearchClanTag() {
        return count($this->getPatternsClanTag()) > 0 ? true : false;
    }

    /**
     * Returns true if there were search patterns given to the ladder.
     * @return boolean
     */
    public function hasSearchClan() {
        return count($this->getPatternsClan()) > 0 ? true : false;
    }
    
    /**
     * Returns j JSON String representing the ranks of this ladder. The
     * containing data is reduced. See fields below.
     * @return String
     */
    public function getJson() {
        $jArr = [];
        foreach($this->getRanks() as $rank) {
            $jArr[] = [
                'pos' => $rank->getPos(),
                'level' => $rank->getLevel(),
                'class' => $rank->getPlayer()->getIconFileName(),
                'clan' => $rank->getPlayer()->getClanShort(),
                'name' => $rank->getPlayer()->getName(),
                'time' => $rank->getTimeFormatted(),
            ];
        }
        return json_encode($jArr);
    }

    /**
     * Returns the short version of the realm.
     * @return String
     */
    public function getRealm() {
        return $this->realm;
    }

    /**
     * Returns the season flag that was given by the url parameters.
     * Default is 0 for non season and 1 for season.
     * @return int
     */
    public function getSeason() {
        return $this->season;
    }

    /**
     * Returns the hardcore flag that was given by the url parameters.
     * Default is 0 for softcore and 1 for hardcore.
     * @return int
     */
    public function getHardcore() {
        return $this->hardcore;
    }

    /**
     * Returns the index of the selected season or era.
     * @return int
     */
    public function getIndex() {
        return $this->index;
    }

    /**
     * Returns the type of the ladder, e.g. rift-barbarian for the bararian
     * greater rift ladder.
     * @return String
     */
    public function getClass() {
        return $this->class;
    }

    /**
     * Returns the start position of the ladder
     * @return int
     */
    public function getMin() {
        return $this->min;
    }

    /**
     * Returns the end position of the ladder
     * @return int
     */
    public function getMax() {
        return $this->max;
    }

    /**
     * Returns an array of \Entities\Rank objects.
     * @return array
     */
    public function getRanks() {
        return $this->ranks;
    }

    /**
     * Returns the array of (String) patterns
     * @return array
     */
    public function getPatterns() {
        return $this->patterns;
    }

    /**
     * Returns the array of (String) patterns
     * @return array
     */
    public function getPatternsClanTag() {
        return $this->patternsClanTag;
    }

    /**
     * Returns the array of (String) patterns
     * @return array
     */
    public function getPatternsClan() {
        return $this->patternsClan;
    }

    /**
     * 
     * @param String $realm E.g. 'eu' or 'us'
     * @return \Entities\Ladder
     */
    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }

    /**
     * 
     * @param int $season 0 or 1
     * @return \Entities\Ladder
     */
    public function setSeason($season) {
        $this->season = $season;
        return $this;
    }

    /**
     * 
     * @param int $hardcore 0 or 1
     * @return \Entities\Ladder
     */
    public function setHardcore($hardcore) {
        $this->hardcore = $hardcore;
        return $this;
    }

    /**
     * 
     * @param int $index At least 1. Maximum is given bei the season or era API
     * or set as a global constant.
     * @return \Entities\Ladder
     */
    public function setIndex($index) {
        $this->index = $index;
        return $this;
    }

    /**
     * 
     * @param String $class E.g. 'rift-barbarian' or 'rift-team-4'
     * @return \Entities\Ladder
     */
    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    /**
     * 
     * @param int $min At least 1. Maximum is given by global constant
     * @return \Entities\Ladder
     */
    public function setMin($min) {
        $this->min = min(MAX_LADDER_POSITION, max(MIN_LADDER_POSITION, $min));
        return $this;
    }

    /**
     * 
     * @param int $max At least 1. Maximum is given by global constant.
     * @return \Entities\Ladder
     */
    public function setMax($max) {
        $this->max = min(MAX_LADDER_POSITION, max(MIN_LADDER_POSITION, $max));
        return $this;
    }

    /**
     * Awaits an array of \Entities\Rank objects.
     * @param array $ranks
     * @return \Entities\Ladder
     */
    public function setRanks($ranks) {
        $this->ranks = $ranks;
        return $this;
    }

    /**
     * Explodes and trims the raw patterns into patterns array.
     * @param String $patterns The raw patterns string.
     * @return \Entities\Ladder
     */
    public function setPatterns($patterns) {
        $filtered = trim(str_replace(' ', '', $patterns), ';');
        if(strlen($filtered) > 0) {
            $this->patterns = explode(';', $filtered);
        }
        return $this;
    }

    /**
     * Explodes and trims the raw patterns into patterns array.
     * @param String $patterns The raw patterns string.
     * @return \Entities\Ladder
     */
    public function setPatternsClanTag($patterns) {
        $filtered = trim(str_replace(' ', '', $patterns), ';');
        if(strlen($filtered) > 0) {
            $this->patternsClanTag = explode(';', $filtered);
        }
        return $this;
    }

    /**
     * Explodes and trims the raw patterns into patterns array.
     * @param String $patterns The raw patterns string.
     * @return \Entities\Ladder
     */
    public function setPatternsClan($patterns) {
        $filtered = trim($patterns, ';');
//        $filtered = trim(str_replace(' ', '', $patterns), ';');
        if(strlen($filtered) > 0) {
            $this->patternsClan = explode(';', $filtered);
        }
        return $this;
    }

    /**
     * Returns the average rift level that was reached in this ladder. Defaults
     * to -1.
     * @return double
     */
    public function getAvgLevel() {
        return $this->avgLevel;
    }

    /**
     * Sets the average level that was reached in this ladder. Defaults to 0.
     * @param double $avgLevel
     * @return \Entities\Ladder
     */
    public function setAvgLevel($avgLevel) {
        $this->avgLevel = $avgLevel > -1 ? $avgLevel : 0;
        return $this;
    }

    /**
     * Returns the results array, even it is filled or empty.
     * @return array
     */
    public function getResults() {
        return $this->results;
    }

    /**
     * Returns the results array, even it is filled or empty.
     * @return array
     */
    public function getResultsClanTag() {
        return $this->resultsClanTag;
    }

    /**
     * Returns the results array, even it is filled or empty.
     * @return array
     */
    public function getResultsClan() {
        return $this->resultsClan;
    }

    /**
     * Sets the results array by overriding it.
     * @param array $results
     * @return \Entities\Ladder
     */
    public function setResultsClanTag($results) {
        $this->resultsClanTag = $results;
        return $this;
    }

    /**
     * Sets the results array by overriding it.
     * @param array $results
     * @return \Entities\Ladder
     */
    public function setResultsClan($results) {
        $this->resultsClan = $results;
        return $this;
    }

    /**
     * Sets the results array by overriding it.
     * @param array $results
     * @return \Entities\Ladder
     */
    public function setResults($results) {
        $this->results = $results;
        return $this;
    }

    /**
     * Returns the last update date with the specific format, e.g. 'Fri, 30 Jun 2017 19:00:00 UTC'
     * @return String
     */
    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    /**
     * Sets the last update string og the ladder.
     * Example: 'Fri, 30 Jun 2017 19:00:00 UTC'
     * @param String $lastUpdate
     * @return \Entities\Ladder
     */
    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getMinPara() {
        return $this->minPara;
    }

    /**
     * 
     * @return int
     */
    public function getMaxPara() {
        return $this->maxPara;
    }

    /**
     * 
     * @param int $minPara
     * @return \Entities\Ladder
     */
    public function setMinPara($minPara) {
        $this->minPara = $minPara;
        return $this;
    }

    /**
     * 
     * @param int $maxPara
     * @return \Entities\Ladder
     */
    public function setMaxPara($maxPara) {
        $this->maxPara = $maxPara;
        return $this;
    }

    /**
     * 
     * @return int
     */
    public function getSearchMode() {
        return $this->searchMode;
    }

    /**
     * 
     * @param int $searchMode
     * @return \Entities\Ladder
     */
    public function setSearchMode($searchMode) {
        $this->searchMode = $searchMode;
        return $this;
    }
    
}
