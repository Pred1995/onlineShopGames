<?php


namespace app\controllers;


use app\models\Cart;
use app\models\Order;
use app\models\User;

class CartController extends AppController
{
    public function addAction() {
        $id =!empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = 1;
        if($id) {
            $product = \R::findOne('ranges', 'id = ?', [$id]);
            if(!$product) {
                return false;
            }
        }
        $cart = new Cart();
            $cart->addToCart($product);
            if($this->isAjax()) {
                $this->loadView('cart-modal');
            }
            redirect();

    }

    public function showAction() {
        $this->loadView('cart-modal');
    }

    public function deleteAction() {
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if(isset($_SESSION['cart'][$id])) {
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()) {
            $this->loadView('cart-modal');
        }
        redirect();
    }
    public function clearAction() {
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
            $this->loadView('cart-modal');
    }
    public function viewAction() {
        $this->setMeta('Коризна');
    }
    public function checkoutAction() {
        if(!empty($_POST)) {
            //регистрация польз
                if(!User::checkAuth()) {
                    $user = new User();
                    $data = $_POST;
                    $user->load($data);
                    if(!$user->validate($data) || !$user->checUnique()) {
                        $user->getErrors();
                        $_SESSION['form_data'] = $data;
                        redirect();
                    } else {
                        $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                        if(!$user_id = $user->save('user')) {
                            $_SESSION['error'] = 'Ошиббка!';
                            redirect();
                        }
                    }
                }

                // сохранение заказа
                $data['user_id']  = isset($user_id) ? $user_id : $_SESSION['user']['id'];
                $data['note'] = !empty($_POST['note']) ? $_POST['note'] : '';
                $user_email = isset($_SESSION['user']['email']) ? $_SESSION['user']['email'] : $_POST['email'];
                $orderId = Order::saveOrder($data);
                Order::mailOrder($orderId, $user_email);
        }
        redirect();
    }
}
