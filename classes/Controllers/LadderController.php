<?php

namespace Controllers;

class LadderController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('ladder/ladder_form.tpl');
    }
    
    public function loadAction() {
        $post = filter_input_array(INPUT_POST);
        $_SESSION["search"] = strip_tags( $post["search"] );
        $_SESSION["search-ctag"] = strip_tags( $post["search-ctag"] );
        $_SESSION["search-clan"] = strip_tags( $post["search-clan"] );
        $this->redirect('ladder/show/'.$post['realm'].'/'.$post['season'].'/'.$post['hardcore'].'/'.$post['index'].'/'.$post['class'].'/'.$post['min'].'/'.$post['max'].'/'.$post['minPara'].'/'.$post['maxPara'].'/'.$post['mark']);
    }

    public function showAction($realm, $season, $hardcore, $index, $class, $min, $max, $minPara, $maxPara, $mark) {
        if(
            \Validators\AbstractBattleNetValidator::validateRealm($realm) &&
            \Validators\AbstractBattleNetValidator::validateSeasonFlag($season) &&
            \Validators\AbstractBattleNetValidator::validateHardcoreFlag($hardcore) &&
            \Validators\AbstractBattleNetValidator::validateClass($class) &&
            \Validators\AbstractBattleNetValidator::validateMinMaxPosition($min, $max) &&
            \Validators\AbstractBattleNetValidator::validateMinMaxParagon($minPara, $maxPara) &&
            \Validators\AbstractBattleNetValidator::validateInt($mark, 0, 1)
        ) {
            $ladder = \Mappers\LadderMapper::createObj(
                $realm,
                $season,
                $hardcore,
                \Validators\AbstractBattleNetValidator::getValidatedIndex($realm, $season, $index), //filters invalid index values and returns max possible index
                $class,
                $min,
                $max,
                $minPara,
                $maxPara,
                $mark,
                $_SESSION['search'],
                $_SESSION['search-ctag'],
                $_SESSION['search-clan']);
            \Views\View::getInstance()->assign('ladder', $ladder);
            \Views\View::getInstance()->display('ladder/show_ladder.tpl');
        } else {
            // TODO: set session error etc.
            $this->redirect('ladder');
        }
    }
    
    public function jsonAction($realm, $season, $hardcore, $index, $class, $min, $max, $minPara, $maxPara, $mark) {
        if(
            \Validators\AbstractBattleNetValidator::validateRealm($realm) &&
            \Validators\AbstractBattleNetValidator::validateSeasonFlag($season) &&
            \Validators\AbstractBattleNetValidator::validateHardcoreFlag($hardcore) &&
            \Validators\AbstractBattleNetValidator::validateClass($class) &&
            \Validators\AbstractBattleNetValidator::validateMinMaxPosition($min, $max) &&
            \Validators\AbstractBattleNetValidator::validateMinMaxParagon($minPara, $maxPara) &&
            \Validators\AbstractBattleNetValidator::validateInt($mark, 0, 1)
        ) {
            $ladder = \Mappers\LadderMapper::createObj(
                $realm,
                $season,
                $hardcore,
                \Validators\AbstractBattleNetValidator::getValidatedIndex($realm, $season, $index), //filters invalid index values and returns max possible index
                $class,
                $min,
                $max,
                $minPara,
                $maxPara,
                $mark);
            \Views\View::deleteInstance();
            \Views\View::getInstance()->assign('ladder', $ladder);
            \Views\View::getInstance()->display('ladder/json/show_json.tpl');
        } else {
            $this->redirect('ladder/json/error.tpl');
        }
    }
    
    
}
