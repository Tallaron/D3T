<?php

namespace Controllers;

class FrontController {

    private $controller = '\Controllers\IndexController';
    private $simpleController = 'index';
    private $action = 'indexAction';
    private $simpleAction = 'index';
    private $params = [];
    private $basepath;
    private $excludeIndex = ['ladder.json'];

    public function __construct($basepath = '') {
        $this->basepath = $basepath;
        $this->parseURL();
    }

    public function parseURL() {
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $path = parse_url($uri, PHP_URL_PATH);
        if (strpos($path, $this->basepath) == 0) {
            $path = trim(substr($path, strlen($this->basepath)), '/');
        }

        $params = explode('/', $path, 3);

        if (isset($params[0])) {
            $this->setController($params[0]);
        }

        if (isset($params[1])) {
            $this->setAction($params[1]);
        }

        if (isset($params[2])) {
            $this->setParams($params[2]);
        }
        
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function getParams() {
        return $this->params;
    }

    public function getBasepath() {
        return $this->basepath;
    }

    public function setController($controller) {
        $this->setSimpleController($controller);
        $controller = '\\' . __NAMESPACE__ . '\\' . ucfirst(strtolower($controller)) . 'Controller';
        if (class_exists($controller)) {
            $this->controller = $controller;
        }
    }

    public function setAction($action) {
        $this->setSimpleAction($action);
        $action = strtolower($action) . 'Action';
        if (method_exists($this->getController(), $action)) {
            $this->action = $action;
        }
    }

    public function setParams($params) {
        $this->params = explode('/', trim($params, '/'));
    }

    public function setBasepath($basepath) {
        $this->basepath = $basepath;
    }
    
    /**
     * Returns true if the index template shall not be excluded from rendering
     * and false if.
     * @return boolean
     */
    public function showIndex() {
        return !in_array($this->getSimpleKey(), $this->getExcludeIndex());
    }

    public function run() {
        call_user_func_array(array(new $this->controller, $this->getAction()), $this->getParams());
    }
    
    private function getSimpleController() {
        return $this->simpleController;
    }

    private function getSimpleAction() {
        return $this->simpleAction;
    }
    
    private function getSimpleKey() {
        return $this->getSimpleController().'.'. $this->getSimpleAction();
    }

    private function setSimpleController($simpleController) {
        $this->simpleController = $simpleController;
    }

    private function setSimpleAction($simpleAction) {
        $this->simpleAction = $simpleAction;
    }

    public function getExcludeIndex() {
        return $this->excludeIndex;
    }

    public function setExcludeIndex($excludeIndex) {
        $this->excludeIndex = $excludeIndex;
    }

    public function addExludeIndex($exclude) {
        if(!in_array($exclude, $this->getExcludeIndex())) {
            $this->excludeIndex[] = $exclude;
        }
    }

}
