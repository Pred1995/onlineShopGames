<?php


namespace app\controllers\admin;


use app\models\admin\Product;
use app\models\AppModel;
use ya\App;
use ya\libs\Pagination;

class ProductController extends AppControllerAdmin
{
    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('ranges');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $ranges = \R::getAll("SELECT ranges.* FROM ranges ORDER BY ranges.name LIMIT $start, $perpage");
        $this->setMeta('Ассортимент');
        $this->set(compact('ranges', 'pagination', 'count'));
    }
    public function addImageAction() {
        if(isset($_GET['upload'])) {
            if($_POST['name'] == 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');
            } else {

            }
                $name = $_POST['name'];
                $product = new Product();
                $product->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction() {
        if(!empty($_POST)) {
            $id = $this->getRequestID(false);
            $ranges= new Product();
            $data = $_POST;
            $ranges->load($data);
            $ranges->attributes['status'] = $ranges->attributes['status'] ? '1' : '0';
            $ranges->attributes['hit'] = $ranges->attributes['hit'] ? '1' : '0';
            $ranges->getImg();
            if(!$ranges->validate($data)) {
                $ranges->getErrors();
                redirect();
            }
            if($ranges->update('ranges', $id)) {
                $ranges->editFilter($id, $data);
                $alias = AppModel::createAlias('ranges','alias',$data['name'], $id);
                $ranges = \R::load('ranges', $id);
                $ranges->alias = $alias;
                \R::store($ranges);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }


        }
        $id = $this->getRequestID();
        $ranges = \R::load('ranges', $id);
        App::$app->setProperty('parent_id', $ranges->category_id);
        $filter = \R::getCol('SELECT attr_id FROM attribute_product WHERE product_id = ?', [$id]);
        $this->setMeta('Редактирование');
        $this->set(compact('filter', 'ranges'));

    }

    public function addAction() {
        if(!empty($_POST)) {
            $ranges = new Product();
            $data = $_POST;
            $ranges->load($data);
            $ranges->attributes['status'] = $ranges->attributes['status'] ? '1' : '0';
            $ranges->attributes['hit'] = $ranges->attributes['hit'] ? '1' : '0';
            $ranges->getImg();

            if(!$ranges->validate($data)) {
                $ranges->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if($id = $ranges->save('ranges')) {
                $alias = AppModel::createAlias('ranges','alias',$data['name'], $id);
                $p = \R::load('ranges', $id);
                $p->alias = $alias;
                \R::store($p);
                $ranges->editFilter($id, $data);
                $_SESSION['success'] = 'Товар добавлен';

            }
            redirect();

        }
        $this->setMeta('Новый товар');
    }
    public function deleteAction() {
        $order_id = $this->getRequestID();
        $order = \R::load('ranges', $order_id);
        \R::trash($order);
        $_SESSION['success'] = 'Товар уася удален!';
        redirect(ADMIN . '/product');
    }

    public function deleteItemAction() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if(!$id || !$src) {
            return;
        }
        if(\R::exec("UPDATE ranges SET images='no_image.jpg'  WHERE id = ? AND images = ?", [$id, $src])) {
            @unlink(WWW . "/img/$src");
            exit('1');
        }
        return;
    }

}