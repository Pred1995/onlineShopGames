<div class="single_product ">
    <nav aria-label="breadcrumb" class="text-center">
        <ol class="breadcrumb">
<!--            <li class="breadcrumb-item"><a href="#">Home</a></li>-->
<!--            <li class="breadcrumb-item"><a href="#">Library</a></li>-->
<!--            <li class="breadcrumb-item active" aria-current="page">Data</li>-->
            <?=$breadcrumbs;?>
        </ol>
    </nav>

    <div class="container">
        <div class="row">


            <div class="col-lg-5 order-lg-2 order-1">
               <img src="img/<?=$product->images?>" alt="">
            </div>
            <div class="col-lg-5 order-3">
                <?php $curr = \ya\App::$app->getProperty('currency');
                ?>
                <div class="product_description">
                    <div class="product_name"><?=$product->name?></div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text"><p><?=$product->title?>.</p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">
                            </div>
                            <div class="product_price"><?=$curr['symbol_left'];?> <?=$product->old_price * $curr['value'];?> <?=$curr['symbol_right'];?></div>
                            <div class="button_container">
                                <a data-id="<?=$product->id?>" class="btn btn-success  cart_button add-to-cart-link" id="productAdd" href="cart/add?id=<?=$product->id?>">Добавить в корзину</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>




