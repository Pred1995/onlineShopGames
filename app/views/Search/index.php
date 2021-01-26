<div class="products-row clearfix ">
    <?php if($products) : ?>
        <?php $curr = \ya\App::$app->getProperty('currency'); ?>
        <?php foreach ($products as $hit) :?>
            <div class="col-md-1 col-md-offset-1">
                <div class="product " style="width: 250px">
                    <div class="product-sale img-circle">
                        <span>Sale</span>
                    </div>
                    <div class="product-img">
                        <a href="#">
                            <img src="img/<?=$hit->images?>" alt="">
                        </a>
                    </div><!-- /.prodact-img -->
                    <p class="product-title">
                        <a href="product/<?=$hit->alias;?>"><?=$hit->name?></a>
                    </p>
                    <p class="product-desc">
                        <?=$hit->title?>
                    </p>
                    <div class="product-buy">
                        <p class="product-price">
                            Цена: <?=$curr['symbol_left'];?> <?=$hit->old_price * $curr['value'];?> <?=$curr['symbol_right'];?>
                        </p>
                        <a data-id="<?=$hit->id;?>" class="btn btn-default add-to-cart-link"  href="cart/add?id=<?=$hit->id?>">
                            Добавить в коризну
                        </a>
                    </div><!-- /.prodact-buy -->
                </div><!-- /.prodact -->
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>