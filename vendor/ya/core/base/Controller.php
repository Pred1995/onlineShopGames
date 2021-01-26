<?php


namespace ya\base;


use ya\App;

abstract class Controller
{
    public $route;
    public $controller;
    public $view;
    public $model;
    public $prefix;
    public $layout;
    public $data = [];
    public $meta = ['title' => '','desc' => '', 'keywords' => ''];

    public function __construct($route)
    {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function  getView() {
        $viewObj = new View($this->route,$this->layout,$this->view,$this->meta);
        $viewObj->render($this->data);
    }
    public function set($data) {
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $keywords ='') {
        $this->meta['title'] =  $title;
        $this->meta['desc'] =  $desc;
        $this->meta['keywords'] =  $keywords;
    }
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
    public function loadView($v, $vars = []) {
        extract($vars);
        require APP . "/views/{$this->prefix}{$this->controller}/{$v}.php";
        die;
    }


}