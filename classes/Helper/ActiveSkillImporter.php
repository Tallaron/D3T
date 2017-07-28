<?php

namespace Helper;

class ActiveSkillImporter extends AbstractImporter {

    private $url;
    private $heroClass;
    private $dom;
    private $skills = [];

    public function __construct($url) {
        $this->setUrl($url);
        $this->setDom( self::loadDomData( $this->getUrl() ) );
    }
    
    
    
    public function proceed() {
        $finder = new \DomXPath( $this->getDom() );
        $skillData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' skill-details ')]");
        $runeData = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' rune-list ')]");

        foreach($skillData as $data) {
            $skill = new \Entities\ImportActiveSkill();
            $skill
                ->setHeroClass( $this->getHeroClass() )
                ->setSlug( $this->parseSkillSlug($data) )
                ->setName( $this->parseSkillName($data) )
                ->setIcon( $this->parseSkillIcon($data) );
            $this->addSkill($skill);
        }

        $i=0;
        foreach($runeData as $data) {
            foreach($data->getElementsByTagName('li') as $li) {
                $rune = new \Entities\ImportRune();
                $rune
                    ->setSkill(false)
                    ->setSlug($this->parseRuneSlug( $this->getSkill($i), $li ) )
                    ->setName( $this->parseRuneName($li) )
                    ->setType( $this->parseRuneType($li) );
                $this->getSkill($i)->addRune($rune);
            }
            $i++;
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
