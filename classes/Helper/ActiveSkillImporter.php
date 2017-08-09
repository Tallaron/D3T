<?php

namespace Helper;

class ActiveSkillImporter extends AbstractImporter {

    private $heroClass;
    private $url;
    private $dom;
    private $skills = [];

    public function __construct($heroClass) {
        $this->setHeroClass($heroClass);
        $this->setUrl( sprintf(ACTIVE_SKILL_IMPORT_URL, $heroClass->getKey()) );
        $this->setDom( self::loadDomData( $this->getUrl() ) );
    }
    
    
    
    public function proceed() {
        $finder = new \DomXPath( $this->getDom() );
        $skillData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' skill-details ')]");
        $runeData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' rune-list ')]");

        foreach($skillData as $data) {
            $this->createSkillObject($data);
        }

        $i=0;
        foreach($runeData as $data) {
            $this->addRunes($data, $this->getSkill($i));
            $i++;
        }
        
    }
    
    
    private function createSkillObject($data) {
        $skill = new \Entities\Skill();
        $skill
            ->setHeroClass( $this->getHeroClass() )
            ->setSlug( $this->parseSkillSlug($data) )
            ->setName( $this->parseSkillName($data) )
            ->setIcon( $this->parseSkillIcon($data) );
        $this->addSkill($skill);
    }

    private function addRunes($data, $skill) {
        foreach($data->getElementsByTagName('li') as $li) {
            $rune = new \Entities\Rune();
            $rune
                ->setSkillId(false)
                ->setSlug($this->parseRuneSlug( $skill, $li ) )
                ->setName( $this->parseRuneName($li) )
                ->setType( $this->parseRuneType($li) );
            $skill->addRune($rune);
        }
    }

    private function parseSkillSlug($data) {
        return self::getLastElement( $data
                                ->getElementsByTagName('h3')[0]
                                ->getElementsByTagName('a')[0]
                                ->getAttribute('href'));
    }

    private function parseSkillName($data) {
        return $data
                ->getElementsByTagName('h3')[0]
                ->getElementsByTagName('a')[0]
                ->nodeValue;
    }

    private function parseSkillIcon($data) {
        return self::getLastElement( explode('.png', $data
                                        ->getElementsByTagName('a')[0]
                                        ->getElementsByTagName('span')[0]
                                        ->getAttribute('style'))[0]);
    }

    private function parseRuneSlug($skill, $data) {
        return $skill->getSlug() . '-' . self::getLastElement( $data
                                            ->getElementsByTagName('span')[2]
                                            ->getAttribute('data-d3tooltip'));
    }

    private function parseRuneName($data) {
        return trim( $data
                        ->getElementsByTagName('span')[2]
                        ->nodeValue);
    }

    private function parseRuneType($data) {
        return self::getLastElement( $data
                        ->getElementsByTagName('span')[2]
                        ->getAttribute('data-d3tooltip') );
    }

    
    
    
    
    

    private function addSkill($skill) {
        $this->skills[] = $skill;
    }
    
    public function getSkill($index) {
        return $this->skills[$index];
    }

    
    
    
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function getDom() {
        return $this->dom;
    }

    public function setDom($dom) {
        $this->dom = $dom;
        return $this;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function setSkills($skills) {
        $this->skills = $skills;
        return $this;
    }

    public function getHeroClass() {
        return $this->heroClass;
    }

    public function setHeroClass($heroClass) {
        $this->heroClass = $heroClass;
        return $this;
    }


    
}
