<?php

namespace Controllers;

class ProfileController extends AbstractController {

    
    public function indexAction() {
        \Views\View::getInstance()->display('profile/profile_form.tpl');
    }
    
    
    public function loadAction() {
        $post = filter_input_array(INPUT_POST);
        if(isset($post['btag']) && $this->isValidBTag($post['btag'])) {
            $this->redirect('profile/show/'.$post['realm'].'/'. str_replace('#', '-', $post['btag']));
        } else {
            $this->redirect('profile');
        }
    }
    
    
    
    
    public function showAction($realm, $btag, $content = 'overview', $id = 0) {
        $profile = \Mappers\ProfileMapper::createObj($realm, str_replace('-', '#', $btag), $content, $id);
        \Views\View::getInstance()->assign('content', $content); //containts just a switch case key
        \Views\View::getInstance()->assign('profile', $profile);
        \Views\View::getInstance()->display('profile/profile.tpl');
    }

    











    private function isValidBTag($bTag) {
        if(substr_count($bTag, '#') != 1 && substr_count($bTag, '-') != 1) {
            return false;
        }
        if(strpos($bTag, '#') == 0 && strpos($bTag, '-') == 0) {
            return false;
        }
        if(strpos($bTag, '#') >= strlen($bTag)-1 && strpos($bTag, '-') >= strlen($bTag)-1) {
            return false;
        }
        return true;
    }
    
    
    
}
