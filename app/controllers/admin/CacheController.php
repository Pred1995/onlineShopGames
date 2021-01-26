<?php

namespace app\controllers\admin;

use ya\Cache;

class CacheController extends AppControllerAdmin {

    public function indexAction(){
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = \ya\Cache::instance();
        switch($key){
            case 'category':
                $cache->delete('cats');
                $cache->delete('ya');
                break;
        }
        $_SESSION['success'] = 'Выбранный кэш удален';
        redirect();
    }

}