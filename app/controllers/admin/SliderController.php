<?php


namespace app\controllers\admin;


use app\models\admin\Product;
use app\models\admin\Slider;
use app\models\AppModel;
use ya\App;
use ya\libs\Pagination;

class SliderController extends AppControllerAdmin
{
    public function indexAction() {
        $slider = \R::getAll("SELECT slider.* FROM slider");
        $this->setMeta('Слайдер');
        $this->set(compact('slider'));
    }
    public function addImageAction() {
        if(isset($_GET['upload'])) {
            if($_POST['name'] == 'single') {
                $wmax = 1600;
                $hmax = 617;
            } else {

            }
            $name = $_POST['name'];
            $slider = new Slider();
            $slider->uploadImg($name, $wmax, $hmax);
        }
    }

    public function editAction() {
        if(!empty($_POST)) {
            $id = $this->getRequestID(false);
            $slider = new Slider();
            $data = $_POST;
            $slider->load($data);
            $slider->attributes['active'] = $slider->attributes['active'] ? 'active' : 'none';
            $slider->getImg();
            if(!$slider->validate($data)) {
                $slider->getErrors();
                redirect();
            }
            if($slider->update('slider', $id)) {
                $slider = \R::load('slider', $id);
                \R::store($slider);
                $_SESSION['success'] = 'Изменения сохранены';
                redirect();
            }


        }
        $id = $this->getRequestID();
        $slider = \R::load('slider', $id);
        $this->setMeta('Редактирование');
        $this->set(compact( 'slider'));

    }

    public function addAction() {
        if(!empty($_POST)) {
            $slider = new Slider();
            $data = $_POST;
            $slider->load($data);
            $slider->attributes['active'] = $slider->attributes['active'] ? 'active' : 'none';
            $slider->getImg();

            if(!$slider->validate($data)) {
                $slider->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }

            if($id = $slider->save('slider')) {
                $p = \R::load('slider', $id);
                \R::store($p);
                $_SESSION['success'] = 'Товар добавлен';
            }
            redirect();

        }
        $this->setMeta('Новый товар');
    }
    public function deleteAction() {
        $order_id = $this->getRequestID();
        $order = \R::load('slider', $order_id);
        \R::trash($order);
        $_SESSION['success'] = 'Слайдер удален!';
        redirect(ADMIN . '/slider');
    }

    public function deleteItemAction() {
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $src = isset($_POST['src']) ? $_POST['src'] : null;
        if(!$id || !$src) {
            return;
        }
        if(\R::exec("UPDATE slider SET images='no_image.jpg'  WHERE id = ? AND images = ?", [$id, $src])) {
            @unlink(WWW . "/img/$src");
            exit('1');
        }
        return;
    }

}