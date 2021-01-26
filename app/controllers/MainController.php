<?php


namespace app\controllers;

use ya\Cache;

use ya\App;

class MainController extends AppController
{

    public function indexAction() {
        $nation = \R::find('nation', 'LIMIT 3');
        $hits = \R::find('ranges', "hit = '1' AND status = '1' LIMIT 3");
        $hitscat = \R::find('category', "hit = '1' LIMIT 10");
        $slider = \R::find('slider', 'LIMIT 4');
        $this->set(compact('nation', 'hits', 'slider', 'hitscat'));
        $this->setMeta('Премиум магазин', 'Премиум магазин', 'Ключевики');

    }
}