<section class="main-slogan">
    <div class="container">
        <h1>Победа или Смерть!</h1>
    </div>
</section>

<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row">
                    <div class="content">
                        <h3>Доступные нации</h3>
                        <div class="products-row clearfix">
                            <?php if($nation) : ?>
                            <?php foreach ($nation as $nat) :?>
                            <div class="col-sm-4" >
                                <div class="product" STYLE="background-image: url(img/<?=$nat->img;?>)">
                                    
                                    <p class="product-desc">
                                    </p>
                                    <div class="product-buy">
                                        <p class="product-price">
                                        </p>
                                        <a class="btn btn-default" href="nation/<?=$nat->alias;?>">
                                            Смотреть
                                        </a>
                                    </div><!-- /.prodact-buy -->
                                </div><!-- /.prodact -->
                            </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div><!-- /.products-row -->

                        <h3>Популярные предложения</h3>
                        <div class="products-row clearfix">
                            <?php if($hits) : ?>
                            <?php $curr = \ya\App::$app->getProperty('currency'); ?>
                            <?php foreach ($hits as $hit) :?>
                            <div class="col-sm-4">
                                <div class="product">
                                    <div class="product-sale img-circle">
                                        <span>ХИТ</span>
                                    </div>
                                    <div class="product-img">
                                        <a href="product/<?=$hit->alias;?>">
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
                                    </div>
                                </div>
                            </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-xs-6 col-md-12">
                            <div class="widget">
                                <h3>Популярные категории</h3>
                                <ul>
                                    <?php if($hitscat) : ?>
                                    <?php foreach ($hitscat as $cat) :?>
                                    <li>
                                        <a href="category/<?=$cat->alias;?>"><?=$cat->title;?> <?=$cat->keywords;?> </a>
                                    </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div><!-- /.widget -->
                        </div>
                    </div>

                    <div class="about">
                        <h3>О премиум магазине</h3>
                        <p>В премиум магазине представлены категории доступные в игре за золото </p>
                    </div>
                </div><!-- /.sidebar -->
            </div>
        </div>
    </div>
</section>


