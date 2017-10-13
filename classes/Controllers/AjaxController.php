<?php

namespace Controllers;

class AjaxController extends AbstractController {

    
    public function indexAction() {
        $this->redirect('');
    }
    
    public function tooltipAction($type = '') {
        switch($type) {
            case 'profile-item':
            case 'profile-gem':
                $hash = explode('/', filter_input(INPUT_POST, 'data'))[1];
                $this->showData(file_get_contents(sprintf(BLIZZARD_D3_PROFILE_ITEM_TOOLTIP_URL, $hash) ));
                break;
            case 'item':
            case 'gem':
            case 'cube':
                $hash = explode('/', filter_input(INPUT_POST, 'data'))[1];
                $this->showData(file_get_contents(sprintf(BLIZZARD_D3_ITEM_TOOLTIP_URL, $hash) ));
                break;
            case 'skill':
                $data = filter_input(INPUT_POST, 'data');
                $this->showData(file_get_contents(sprintf(BLIZZARD_D3_SKILL_TOOLTIP_URL, $data) ));
                break;
            case 'rune':
                $data = filter_input(INPUT_POST, 'data');
                $this->showData(
                        file_get_contents(sprintf(BLIZZARD_D3_SKILL_TOOLTIP_URL, substr($data,0, strlen($data)-2)) ).
                        file_get_contents(sprintf(BLIZZARD_D3_RUNE_TOOLTIP_URL, $data) )
                );
                break;
            default:
                break;
        }
        
    }


    private function showData($data) {
        \Views\View::getInstance()->assign('data', $data);
        \Views\View::getInstance()->display('ajax/tooltip/tooltip.tpl');
    }
    
}
