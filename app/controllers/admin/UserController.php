<?php


namespace app\controllers\admin;


use app\models\User;
use ya\libs\Pagination;

class UserController extends AppControllerAdmin {

    public function indexAction() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 3;
        $count = \R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start  = $pagination->getStart();
        $users = \R::findAll('user', "LIMIT $start, $perpage");
        $this->setMeta("Список пользователей");
        $this->set(compact('users', 'pagination', 'count'));
    }


    public function loginAdminAction() {
        if(!empty($_POST)) {
            $user = new User();
            if($user->login(true)) {
                $_SESSION['success'] = 'Успешная авторизация';
            } else {
                $_SESSION['error'] = 'Логин или пароль введены неправильно!';
            }
            if(User::isAdmin()) {
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
        $this->layout = 'login';
    }
}