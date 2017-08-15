<?php

namespace Helper;

class PassiveSkillImporter extends AbstractImporter {

    private $heroClass;
    private $url;
    private $dom;
    private $skills = [];

    public function __construct($heroClass) {
        $this->setHeroClass($heroClass);
        $this->setUrl( sprintf(PASSIVE_SKILL_IMPORT_URL, $heroClass->getKey()) );
        $this->setDom( self::loadDomData( $this->getUrl() ) );
    }
    
    
    
    public function proceed() {
        $finder = new \DomXPath( $this->getDom() );
        $skillData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' skill-details ')]");

        foreach($skillData as $data) {
            $skill = new \Entities\Skill();
            $skill
                ->setHeroClass( $this->getHeroClass() )
                ->setSlug( $this->parseSkillSlug($data) )
                ->setName( $this->parseSkillName($data) )
                ->setIcon( $this->parseSkillIcon($data) );
            $this->addSkill($skill);
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
