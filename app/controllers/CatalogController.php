<?php


namespace app\controllers;


use ya\App;

class CatalogController extends AppController
{
    public function viewAction() {
        $hits = \R::find('ranges', "hit = '1' AND status = '1' LIMIT 4");
        $this->set(compact('hits'));
    }
}