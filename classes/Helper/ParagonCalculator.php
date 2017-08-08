<?php

namespace Helper;

class ParagonCalculator {

    private $data; //Paragon Array
    private $nonSeason;
    private $season;
    private $overall;
    
    /**
     * For initializing Paragon source data from csv
     * @param type $source
     */
    public function generateData($source) {
        $d = array();
        if (($handle = fopen($source, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 250, ",")) !== FALSE) {
                $d[] = (double) str_replace(",", "", $data[1]);
            }
            fclose($handle);
        }
        file_put_contents('data/paragon.dat', serialize($d));
    }

    
    /**
     * Paragon-Builder
     * @param type $level
     * @return \Entities\Paragon
     */
    public function createParagon($level) {
        $p = new \Entities\Paragon();
        $p->setLevel($level);
        $p->setXp($this->getXp($p->getLevel()));
        return $p;
    }

    

    public function calculate() {
        $this->setOverall( new \Entities\Paragon() );
        $this->getOverall()->setXp( $this->getOverallXp() );
        $this->getOverall()->setLevel( $this->getOverallLevel() );
        return $this;
    }

    



    public function getOverallXp() {
        return $this->getNonSeason()->getXp() + $this->getSeason()->getXp();
    }
    
    public function getOverallLevel() {

        foreach($this->getData() as $k => $v) {
            if($v > $this->getOverallXp()) {
                return $k-1;
            }
        } return count($this->getData())-1;
        
    }

    
    
    
    



    public function getProgressLimit($paragon) {
        return max(MIN_PARAGON, min(MAX_PARAGON, (floor($paragon->getLevel() / PARAGON_LIMIT_STEP) + 1) * PARAGON_LIMIT_STEP));
    }


    public function getProgress($paragon) {
        $limit = $this->getProgressLimit($paragon);
        return floor($paragon->getXp() / $this->getXp($limit) * 100);
    }

    













    public function getXp($level) {
        return $this->data[$level];
    }

    public function getData() {
        return $this->data;
    }

    public function getNonSeason() {
        return $this->nonSeason;
    }

    public function getSeason() {
        return $this->season;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function setNonSeason($nonSeason) {
        $this->nonSeason = $this->createParagon( (int)$nonSeason );
        return $this;
    }

    public function setSeason($season) {
        $this->season = $this->createParagon( (int)$season );
        return $this;
    }

    public function getOverall() {
        return $this->overall;
    }

    public function setOverall($overall) {
        $this->overall = $overall;
        return $this;
    }


    
}
