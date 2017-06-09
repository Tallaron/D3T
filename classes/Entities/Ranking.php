<?php

namespace Entities;

class Ranking {

    private $realm;
    private $mode;
    private $num;
    private $class;
    private $min;
    private $max;

    private $ranks = array();
    
    private $data;



    public function __construct() {
        $this->min = RANKING_DEFAULT_MIN;
        $this->max = RANKING_DEFAULT_MAX;
    }



    public function loadData() {
        $src = 'https://'.$this->determineRealm().'.battle.net/d3/'.$this->determineLang().'/rankings/'.$this->determineMode().'/'.$this->determineNum().'/rift-'.$this->determineType().$this->determineClass();
        $file_headers = @get_headers($src);
        
        if(strpos($file_headers[0], '200') > 1) {
            $this->data = file_get_contents($src);
            $this->fillArray();
        } else {
            $_SESSION['error'] = ERROR_404;
            header('Location: '.BASE_DIR.'/error');
        }

    }

    





    private function determineRealm() {
        if(array_key_exists($this->getRealm(), BNET_URL)) {
            return $this->getRealm();
        } return RANKING_DEFAULT_REALM;
    }

    private function determineLang() {
        switch($this->getRealm()) {
            case 'kr':
                return 'ko';
            default:
                return RANKING_DEFAULT_LANG;
        }
    }

    private function determineMode() {
        switch($this->getMode()) {
            case 'n':
            case 'hc':
                return 'era';
            case 's':
            case 'shc':
                return 'season';
            default:
                return RANKING_DEFAULT_MODE;
        }
    }

    private function determineNum() {
        switch($this->determineMode()) {
            case 'era':
                return min(BNET_MAX_ERA , max(BNET_MIN_ERA, $this->getNum()));
            case 'season':
                return min(BNET_MAX_SEASON , max(BNET_MIN_SEASON, $this->getNum()));
            default:
                return RANKING_DEFAULT_NUM;
        }
    }

    private function determineType() {
        switch($this->getMode()) {
            case 'n':
            case 's':
                return '';
            case 'hc':
            case 'shc':
                return 'hardcore-';
            default:
                return RANKING_DEFAULT_TYPE;
        }
    }

    private function determineClass() {
        if(array_key_exists($this->getClass(), BNET_CLASSES)) {
            return $this->getClass();
        } return RANKING_DEFAULT_CLASS;
    }

    












    private function fillArray() {
        $dataRows = explode('<td class="cell-Rank"', $this->data);
        array_shift($dataRows);
        foreach($dataRows as $data) {
            $rank = new Rank();
            $rank->setName($this->getRankName($data))
                ->setLevel($this->getRankLevel($data))
                ->setTime($this->getRankTime($data))
                ->setDate($this->getRankDate($data))
                ->setProfile($this->getRankProfile($data) ? BNET_URL[$this->getRealm()].trim($this->getRankProfile($data), '/') : false);
            $this->ranks[] = $rank;
        }
    }

    
    
    
    
    
    
    
    
    private function getRankName($data) {
        $open = '<td class="cell-BattleTag" >';
        $close = '</td>';
        $content = $this->getContent($data, $open, $close);
        return substr_count($content, '<strong') ? $this->getContent($data, '.png" />', '</a>') : '~Unknown~';
    }
    
    private function getRankLevel($data) {
        $open = '<td class="cell-RiftLevel" >';
        $close = '</td>';
        return $this->getContent($data, $open, $close);
    }

    private function getRankTime($data) {
        $open = '<td class="cell-RiftTime" >';
        $close = '</td>';
        return $this->getContent($data, $open, $close);
    }

    private function getRankDate($data) {
        $open = '<td class="cell-CompletedTime" >';
        $close = '</td>';
        return $this->getContent($data, $open, $close);
    }

    private function getRankProfile($data) {
        $open = '<td class="cell-BattleTag" >';
        $close = '</td>';
        $content = $this->getContent($data, $open, $close);
        return substr_count($content, '<strong') ? $this->getContent($data, '<a href="', '" title') : false;
    }

    
    
    
    
    private function getContent($data, $open, $close) {
        $first = explode($open, $data);
        $second = explode($close, $first[1]);
        return $second[0];
    }

    




















    public function setRange($min, $max) {
        if($max >= $min) {
            $this->min = min(1000, max(1, $min));
            $this->max = min(1000, max(1, $max));
        }
    }

    private function getLength() {
        return $this->max - $this->min + 1;
    }
    
    public function getAverageLevel() {
        $sum = 0;
        $ranks = $this->getRanks();
        for($i = $this->getMin()-1; $i<$this->getMax(); $i++) {
            $sum += $ranks[$i]->getLevel();
        }
        return $sum / $this->getLength();
    }

    
    public function getRanksOutput() {
        return array_splice($this->getRanks(), $this->min-1, $this->getLength());
    }

    public function getRanks() {
        return $this->ranks;
    }

    public function getNum() {
        return $this->num;
    }

    public function getMode() {
        return $this->mode;
    }

    public function getClass() {
        return $this->class;
    }

    public function getMin() {
        return $this->min;
    }

    public function getMax() {
        return $this->max;
    }

    public function getData() {
        return $this->data;
    }

    public function setNum($num) {
        $this->num = $num;
        return $this;
    }

    public function setMode($mode) {
        $this->mode = $mode;
        return $this;
    }

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    public function setMin($min) {
        $this->min = $min;
        return $this;
    }

    public function setMax($max) {
        $this->max = $max;
        return $this;
    }

    public function setData($data) {
        $this->data = $data;
        return $this;
    }

    public function setRanks($ranks) {
        $this->ranks = $ranks;
        return $this;
    }

    public function getRealm() {
        return $this->realm;
    }

    public function setRealm($realm) {
        $this->realm = $realm;
        return $this;
    }




    
}
