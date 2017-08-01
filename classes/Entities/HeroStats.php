<?php

namespace Entities;

class HeroStats {

    private $life;
    private $damage;
    private $toughness;
    private $healing;
    private $attackSpeed;
    private $armor;
    private $strength;
    private $dexterity;
    private $intelligence;
    private $vitality;
    private $physResist;
    private $fireResist;
    private $coldResist;
    private $lightningResist;
    private $poisonResist;
    private $arcaneResist;
    private $critDamage;
    private $critChance;
    private $thorns;
    private $primaryResource;
    private $secondaryResource;
    
    
    public function getLife() {
        return $this->life;
    }

    public function getDamage() {
        return $this->damage;
    }

    public function getToughness() {
        return $this->toughness;
    }

    public function getHealing() {
        return $this->healing;
    }

    public function getAttackSpeed() {
        return $this->attackSpeed;
    }

    public function getArmor() {
        return $this->armor;
    }

    public function getStrength() {
        return $this->strength;
    }

    public function getDexterity() {
        return $this->dexterity;
    }

    public function getIntelligence() {
        return $this->intelligence;
    }

    public function getVitality() {
        return $this->vitality;
    }

    public function getPhysResist() {
        return $this->physResist;
    }

    public function getFireResist() {
        return $this->fireResist;
    }

    public function getColdResist() {
        return $this->coldResist;
    }

    public function getLightningResist() {
        return $this->lightningResist;
    }

    public function getPoisonResist() {
        return $this->poisonResist;
    }

    public function getArcaneResist() {
        return $this->arcaneResist;
    }

    public function getCritDamage() {
        return $this->critDamage;
    }

    public function getCritChance() {
        return $this->critChance;
    }

    public function getThorns() {
        return $this->thorns;
    }

    public function getPrimaryResource() {
        return $this->primaryResource;
    }

    public function getSecondaryResource() {
        return $this->secondaryResource;
    }

    public function setLife($life) {
        $this->life = $life;
        return $this;
    }

    public function setDamage($damage) {
        $this->damage = $damage;
        return $this;
    }

    public function setToughness($toughness) {
        $this->toughness = $toughness;
        return $this;
    }

    public function setHealing($healing) {
        $this->healing = $healing;
        return $this;
    }

    public function setAttackSpeed($attackSpeed) {
        $this->attackSpeed = $attackSpeed;
        return $this;
    }

    public function setArmor($armor) {
        $this->armor = $armor;
        return $this;
    }

    public function setStrength($strength) {
        $this->strength = $strength;
        return $this;
    }

    public function setDexterity($dexterity) {
        $this->dexterity = $dexterity;
        return $this;
    }

    public function setIntelligence($intelligence) {
        $this->intelligence = $intelligence;
        return $this;
    }

    public function setVitality($vitality) {
        $this->vitality = $vitality;
        return $this;
    }

    public function setPhysResist($physResist) {
        $this->physResist = $physResist;
        return $this;
    }

    public function setFireResist($fireResist) {
        $this->fireResist = $fireResist;
        return $this;
    }

    public function setColdResist($coldResist) {
        $this->coldResist = $coldResist;
        return $this;
    }

    public function setLightningResist($lightningResist) {
        $this->lightningResist = $lightningResist;
        return $this;
    }

    public function setPoisonResist($poisonResist) {
        $this->poisonResist = $poisonResist;
        return $this;
    }

    public function setArcaneResist($arcaneResist) {
        $this->arcaneResist = $arcaneResist;
        return $this;
    }

    public function setCritDamage($critDamage) {
        $this->critDamage = $critDamage;
        return $this;
    }

    public function setCritChance($critChance) {
        $this->critChance = $critChance;
        return $this;
    }

    public function setThorns($thorns) {
        $this->thorns = $thorns;
        return $this;
    }

    public function setPrimaryResource($primaryResource) {
        $this->primaryResource = $primaryResource;
        return $this;
    }

    public function setSecondaryResource($secondaryResource) {
        $this->secondaryResource = $secondaryResource;
        return $this;
    }

    
}
