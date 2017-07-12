<?php

namespace Controllers;

class BuildController extends AbstractController {

    
    public function indexAction() {
        
        $builds = [];
        
        
        
        
        $dir = BUILDS_DATA_BASE_DIR;
        $handle = opendir($dir);
        
        while($heroClass = readdir($handle)) {
            if($heroClass != '.' && $heroClass != '..') {
                $builds[$heroClass] = [];
                $innerHandle = opendir($dir.'/'.$heroClass);
                while($buildDataFile = readdir($innerHandle)) {
                    if($buildDataFile != '.' && $buildDataFile != '..') {
                        $data = simplexml_load_file($dir.'/' . $heroClass . '/' .$buildDataFile);
                        $builds[$heroClass][] = array(
                            'key' => $buildDataFile,
                            'name' => (string)$data->name,
                            );
                    }
                }
            }
        }
        
        closedir($handle);
        
        echo '<pre>';
        print_r($builds);
        die();
        
        
        
        \Views\View::getInstance()->display('builds/builds.tpl');
    }
    
    
    
    
}
