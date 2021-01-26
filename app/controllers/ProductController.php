<?php


namespace app\controllers;


use app\models\Breadcrumbs;

class ProductController extends AppController
{
    public function viewAction() {
        $alias = $this->route['alias'];
        $product = \R::findOne('ranges', "alias = ? AND status = '1'", [$alias]);
        if(!$product) {
            throw new \Exception("Страница не найдена", 404);
        }

        $breadcrumbs = Breadcrumbs::getBreadcrumbs($product->category_id,$product->name);

        $this->setMeta($product->name,'','');
        $this->set(compact('product', 'breadcrumbs'));
    }
}