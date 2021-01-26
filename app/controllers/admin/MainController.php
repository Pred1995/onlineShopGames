<?php


namespace app\controllers\admin;


class MainController extends AppControllerAdmin
{
    public function indexAction() {
        $countNewOrders = \R::count('order', "status = '0'");
        $countUsers = \R::count('user');
        $countRanges = \R::count('ranges');

        $this->setMeta('Панель управления');
        $this->set(compact('countNewOrders', 'countUsers', 'countRanges'));
    }
}