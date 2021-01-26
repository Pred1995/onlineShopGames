<?php


namespace app\controllers;


class NationController extends AppController
{
    public function viewAction() {
        $alias = $this->route['alias'];
        $nations = \R::findOne('nation', "alias = ?", [$alias]);
        if(!$nations) {
            throw new \Exception("Страница не найдена", 404);
        }

        $this->setMeta($nations->title,'','');
        $this->set(compact('nations'));
    }
}