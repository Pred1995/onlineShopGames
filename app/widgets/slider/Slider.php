<?php


namespace app\widgets\slider;


use ya\App;
use ya\Cache;

class Slider
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    protected $table = 'slider';
    protected $cache = 3600;
    protected $cacheKey = 'ya';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = []){
        $this->tpl = __DIR__ . '/slider_tpl/slider.php';
        $this->run();
    }
    protected function run() {
        $per = \R::findAll("slider");
        echo $this->getHTML($per);
    }


    protected function getHTML($slider) {
        ob_start();
         $slider;
        require_once $this->tpl;
        return ob_get_clean();
    }
}