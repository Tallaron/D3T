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
    
    
    
    
    public function showAction($realm, $btag) {
        $pm = new \Mappers\ProfileMapper();
        $pm->initProfile($realm, str_replace('-', '#', $btag));
        $pm->loadProfileData(self::$settings);
        \Views\View::getInstance()->assign('profile', $pm->getProfile());
        \Views\View::getInstance()->display('profile/profile.tpl');
    }

    











    private function isValidBTag($bTag) {
        if(substr_count($bTag, '#') != 1) {
            return false;
        }
        if(strpos($bTag, '#') == 0) {
            return false;
        }
        if(strpos($bTag, '#') >= strlen($bTag)-1) {
            return false;
        }
        return true;
    }
    
    
    
}
