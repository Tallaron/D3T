<?php

namespace Mappers;

class ScopeListMapper {
    
    public static function createObject(array $data) {
        $sl = new \Entities\ScopeList();
        foreach($data as $scope) {
            $method = 'set'.ucfirst($scope->key);
            if(method_exists($sl, $method)) {
                $sl->$method($scope->val);
            }
        }
        return $sl;
    }
    
}
