<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <?=$this->getMeta();?>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:700,400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/elastislide.css" rel="stylesheet">
    <link href="css/product.css" rel="stylesheet">
    <link href="css/stylefilter.css" rel="stylesheet">
    <link rel="stylesheet" href="megamenu/css/style.css">


</head>
<body>

<header>
    <div class="menu-top">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-top" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="menu-top">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">ПОДДЕРЖКА</a>
                        </li>
                        <li>
                            <a href="#">КОНТАКТЫ</a>
                        </li>
                        <li class="dropdown">
                            <select class="select-css" id="currency" tabindex="4" name="">
                                <?php new \app\widgets\currency\Currency(); ?>
                            </select>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                АККАУНТ <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(!empty($_SESSION['user'])) :?>
                                <li><a href="">Добро пожаловать, <?=h($_SESSION['user']['name']);?> </a></li>
                                <li><a href="user/logout">Выход</a></li>
                                <?php else: ?>
                                    <li><a href="user/login">Вход</a></li>
                                    <li><a href="user/signup">Регистрация</a></li>
                                <?php endif;  ?>
                            </ul>
                        </li>
                        <li>
                            <a href="#">РЕГИСТРАЦИЯ</a>
                        </li>
                        <li>
                            <a href="cart/show" onclick="getCart(); return false;" class="btn-red">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                КОРЗИНА <?php if(!empty($_SESSION['cart'])) :?>
                                    <span class="simpleCart"><?=$_SESSION['cart.currency']['symbol_left'] .  $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></span>
                                <?php else: ?>
                                <span>ПУСТА</span>
                                <?php endif; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <section class="menu-carousel">
        <div id="carousel" class="carousel fade" data-ride="carousel">

            <div class="main-menu">
                <nav class="navbar navbar-inverse">
                    <div class="container">
                        <div class="main-menu-bg">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                                    <span class="sr-only">Навигация</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?=PATH;?>">
                                    <img src="img/logotip.png" alt="Logo image">
                                    <span>H&S</span>
                                </a>
                            </div>

                            <div class="collapse navbar-collapse" id="main-menu">
                                        <div class="menu-container nav navbar-nav">
                                        <div class="menu">
                                        <?php new \app\widgets\menu\Menu([
                                            'tpl' => WWW  . '/menu/menu.php',
                                        ]);?>
                                        </div>
                                        </div>
                                <div class="nav navbar-nav navbar-right">
                                    <form action="search" class="navbar-form navbar-left" method="get" autocomplete="off">
                                        <div class="input-group">
                                            <input type="text" class="form-control typeahead" id="typeahead" name="s">
                                            <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                                    </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <i class="search glyphicon glyphicon-search"></i>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="carousel-indicators-wrap">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                </ol>
            </div>
            <?php new \app\widgets\slider\Slider();?>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel fade -->
    </section>
</header>

<div class="content">
    <div class="container">
        <div class="row">
       <div class="col-md-12">
           <?php
            if(isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
           <?php endif; ?>
           <?php
           if(isset($_SESSION['success'])) : ?>
               <div class="alert alert-success">
                   <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
               </div>
           <?php endif; ?>
      </div>
        </div>
    </div>

    <?=$content?>
</div>

<footer>
    <div class="footer-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <h5>Информация и поддержка</h5>
                            <ul>
                                <li>
                                    <a href="#">Контакты</a>
                                </li>
                                <li>
                                    <a href="#">Поддержка</a>
                                </li>
                                <li>
                                    <a href="#">FAQ</a>
                                </li>

                            </ul>
                        </div>

                        <div class="clearfix visible-xs-block visible-sm-block"></div>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5>Поддержать нас</h5>
                    <div class="social-icons">
                        <a href="#">
                            <img src="img/fb.jpg" alt="">
                        </a>
                        <a href="#">
                            <img src="img/tw.jpg" alt="">
                        </a>
                        <a href="#">
                            <img src="img/fl.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>&copy; 2020 Премиум магазин.</p>
                </div>
                <div class="col-md-8 text-right pay">
                    <a href="#">
                        <img src="img/pay1.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Корзина -->
<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Корзина</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                <a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
                <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
            </div>
        </div>
    </div>
</div>

<div class="preloader"><img src="img/ring.svg" alt=""></div>


<?php $curr = \ya\App::$app->getProperty('currency'); ?>
<script>
    var path = '<?=PATH;?>',
        course = <?=$curr['value'];?>,
        symboleLeft = '<?=$curr['symbol_left'];?>',
        symboleRight = '<?=$curr['symbol_right'];?>';
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="megamenu/js/megamenu.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>
<script src="js/validator.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.elastislide.js"></script>
<script src="js/modernizr.custom.17475.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="js/main.js"></script>

</body>
</html>