<?php

namespace Controllers;

class LadderController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('ladder/ladder_form.tpl');
    }
    
    public function loadAction() {
        $post = filter_input_array(INPUT_POST);
        $_SESSION["search"] = strip_tags( $post["search"] );
        $this->redirect('ladder/show/'.$post['realm'].'/'.$post['season'].'/'.$post['hardcore'].'/'.$post['index'].'/'.$post['class'].'/'.$post['min'].'/'.$post['max'].'/'.$post['minPara'].'/'.$post['maxPara']);
    }

    



    public function showAction($realm, $season, $hardcore, $index, $class, $min, $max, $minPara, $maxPara) {
        if(
            \Validators\AbstractBattleNetValidator::validateRealm($realm) &&
            \Validators\AbstractBattleNetValidator::validateSeasonFlag($season) &&
            \Validators\AbstractBattleNetValidator::validateHardcoreFlag($hardcore) &&
            \Validators\AbstractBattleNetValidator::validateIndex($realm, $season, $index) &&
            \Validators\AbstractBattleNetValidator::validateClass($class) &&
            \Validators\AbstractBattleNetValidator::validateMinMaxPosition($min, $max) &&
            \Validators\AbstractBattleNetValidator::validateMinMaxParagon($minPara, $maxPara)
        ) {
            $ladder = \Mappers\LadderMapper::createObj(
                $realm,
                $season,
                $hardcore,
                $index,
                $class,
                $min,
                $max,
                $minPara,
                $maxPara,
                $_SESSION['search']);
            \Views\View::getInstance()->assign('ladder', $ladder);
            \Views\View::getInstance()->display('ladder/show_ladder.tpl');
        } else {
            // TODO: set session error etc.
            $this->redirect('ladder');
        }
    }
    
    
    
    
    
    
    
    
    private function validateRealm($realm) {
        return 
            array_key_exists($realm, self::getSettings()->get('BNET_REALM_NAME'))
            ? $realm
            : self::getSettings()->get('RANKING_DEFAULT_REALM');
    }
    
    
    
    
    
    
    
    
    
    
    
    
}
