<?php

namespace Mappers;

class ImportDBMapper extends \Mappers\AbstractDBMapper {
    
    /**
     * Tries to insert/update an raw item into the db.
     * @param \Entities\ImportItem $item
     */
    public static function saveItem(\Entities\Item $item) {
        $fields = ['slug','name','icon','level','type','quality','link'];
        $sql = self::getPreparedInsertUpdateSQL('raw_data_items', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $item->getSlug(),
            $item->getName(),
            $item->getIcon(),
            $item->getLevel(),
            $item->getType()->getId(),
            $item->getQuality(),
            $item->getLink(),
        ]);
        
    }
    
    /**
     * Tries to insert/update a raw passive skill into the db.
     * @param \Entities\ImportPassiveSkill $skill
     */
    public static function savePassiveSkill(\Entities\Skill $skill) {
        $fileds = ['class_id','slug','name','icon'];
        $sql = self::getPreparedInsertUpdateSQL('raw_data_skills_p', $fileds, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $skill->getHeroClass()->getId(),
            $skill->getSlug(),
            $skill->getName(),
            $skill->getIcon(),
        ]);
    }
    
    /**
     * Tries to insert/update a raw active skill into the db.
     * Note: There is no association to any rune at this point of progress.
     * @param \Entities\ImportActiveSkill $skill
     */
    public static function saveActiveSkill(\Entities\Skill $skill) {
        $fileds = ['class_id','slug','name','icon'];
        $sql = self::getPreparedInsertUpdateSQL('raw_data_skills_a', $fileds, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $skill->getHeroClass()->getId(),
            $skill->getSlug(),
            $skill->getName(),
            $skill->getIcon(),
        ]);
        $skill->setId( \Mappers\DBMapper::findSkillIdBySlug( $skill->getSlug() ) );
        self::saveRunes($skill);
    }
    
    /**
     * Iterates through the runes of the <b>$skill</b> and tries to store them
     * in the db accordingly.
     * @param \Entities\ImportActiveSkill $skill
     */
    public static function saveRunes(\Entities\Skill $skill) {
        foreach($skill->getRunes() as $rune) {
            self::saveRune($rune);
        }
    }

    /**
     * Tries to insert/update the rune into the db.
     * @param \Entities\ImportRune $rune
     */
    public static function saveRune(\Entities\Rune $rune) {
        $fields = ['skill_id','slug','name','type'];
        $sql = self::getPreparedInsertUpdateSQL('raw_data_runes', $fields, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $rune->getSkillId(),
            $rune->getSlug(),
            $rune->getName(),
            $rune->getType(),
        ]);
    }

    /**
     * Tries to insert/update the gem into the db.
     * @param \Entities\ImportGem $gem
     */
    public static function saveGem(\Entities\Gem $gem) {
        $fileds = ['slug','name','icon','type','level'];
        $sql = self::getPreparedInsertUpdateSQL('raw_data_gems', $fileds, 1);
        $stmt = self::getPDO()->prepare($sql);
        $stmt->execute([
            $gem->getSlug(),
            $gem->getName(),
            $gem->getIcon(),
            $gem->getType(),
            $gem->getLevel(),
        ]);
    }
    
}
