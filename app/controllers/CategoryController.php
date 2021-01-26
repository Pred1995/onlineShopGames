<?php


namespace app\controllers;


use app\models\Category;
use app\widgets\filter\Filter;

class CategoryController extends AppController
{
        public function viewAction() {
            $alias = $this->route['alias'];
            $category = \R::findOne('category', 'alias = ?', [$alias]);

            $cat_model = new Category();
            $ids = $cat_model->getIds($category->id);
            $ids = !$ids ? $category->id : $ids . $category->id;
            $sql_part = '';
            if(!empty($_GET['filter'])){
                $filter = Filter::getFilter();
                if($filter){
                    $cnt = Filter::getCountGroups($filter);
                    $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id IN ($filter) GROUP BY product_id HAVING COUNT(product_id) = $cnt)";
                }
            }
            $zap = \R::getAll("SELECT ranges.* FROM ranges WHERE status = '1' AND category_id IN ($ids) $sql_part");

            if($this->isAjax()){
                $this->loadView('filter', compact('zap'));
            }
            $this->set(compact('zap'));
        }

}