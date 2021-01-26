<?php


namespace app\controllers;


class SearchController extends AppController
{
    public function typeaheadAction(){
        if($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if($query){
                $products = \R::getAll('SELECT id, name FROM ranges WHERE name LIKE ? LIMIT 11', ["%{$query}%"]);
                echo json_encode($products);
            }
        }
        die;
    }
    public function indexAction() {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if($query) {
            $products = \R::find('ranges', 'name LIKE ?', ["%{$query}%"]);
        }
        $this->set(compact('products'));
        $this->setMeta("Поиск по: " . h($query));
        }
}