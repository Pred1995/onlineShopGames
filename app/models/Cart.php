<?php


namespace app\models;


use ya\App;

class Cart extends AppModel
{
     public function addToCart($ranges, $qty= 1, $mod = null) {
            if (!isset($_SESSION['cart.currency'])) {
                $_SESSION['cart.currency'] = App::$app->getProperty('currency');
            }
            if($mod) {

            } else {
                $ID = $ranges->id;
                $title = $ranges->name;
                $price =  $ranges->old_price;
            }
            if(isset($_SESSION['cart'][$ID])) {
                $_SESSION['cart'][$ID]['qty'] += $qty;
            } else {
                $_SESSION['cart'][$ID] = [
                  'qty' => $qty,
                  'title' => $title,
                  'alias' => $ranges->alias,
                  'price' => $price * $_SESSION['cart.currency']['value'],
                    'img' => $ranges->images,
                ];
            }
            $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
            $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']['value']) : $qty * ($price * $_SESSION['cart.currency']['value']);
     }
     public function deleteItem($id) {
            $qtyMin = $_SESSION['cart'][$id]['qty'];
            $sumMin = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];
            $_SESSION['cart.qty'] -= $qtyMin;
            $_SESSION['cart.sum'] -= $sumMin;
            unset($_SESSION['cart'][$id]);
     }
    public static function recalc($curr){
        if(isset($_SESSION['cart.currency'])){
            if($_SESSION['cart.currency']['base']){
                $_SESSION['cart.sum'] *= $curr->value;
            }else{
                $_SESSION['cart.sum'] = $_SESSION['cart.sum'] / $_SESSION['cart.currency']['value'] * $curr->value;
            }
            foreach($_SESSION['cart'] as $k => $v){
                if($_SESSION['cart.currency']['base']){
                    $_SESSION['cart'][$k]['price'] *= $curr->value;
                }else{
                    $_SESSION['cart'][$k]['price'] = $_SESSION['cart'][$k]['price'] / $_SESSION['cart.currency']['value'] * $curr->value;
                }
            }
            foreach($curr as $k => $v){
                $_SESSION['cart.currency'][$k] = $v;
            }
        }
    }
}