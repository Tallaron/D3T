<?php

namespace Controllers;

class FrontController {

    private $controller = '\Controllers\IndexController';
    private $action = 'indexAction';
    private $params = [];
    private $basepath;

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

//        @list($c, $a, $p) = explode('/', $path, 3);
//
//        if (isset($c)) {
//            $this->setController($c);
//        }
//
//        if (isset($a)) {
//            $this->setAction($a);
//        }
//
//        if (isset($p)) {
//            $this->setParams($p);
//        }

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
        $controller = '\\' . __NAMESPACE__ . '\\' . ucfirst(strtolower($controller)) . 'Controller';
        if (class_exists($controller)) {
            $this->controller = $controller;
        }
    }

    public function setAction($action) {
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

    public function run() {
        call_user_func_array(array(new $this->controller, $this->getAction()), $this->getParams());
    }

}
