<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <?php if(!empty($zap)) : ;?>
                <div class="row">
                    <div class="content">
                        <h3> Продукты </h3>

                        <?php if(!empty($zap)) : ;?>

                        <div class="products-row clearfix productsz">
                            <?php $curr = \ya\App::$app->getProperty('currency'); ?>
                            <?php foreach ($zap as $zp) : ;?>
                            <div class="col-sm-4 ">
                                <div class="product">

                                    <div class="product-img">
                                        <a href="product/<?=$zp['alias'];?>">
                                            <img src="img/<?=$zp['images'];?>" alt="">
                                        </a>
                                    </div>
                                    <p class="product-title">
                                        <a href="product/<?=$zp['alias'];?>"><?=$zp['name'];?></a>
                                    </p>
                                    <p class="product-desc">
                                        <?=$zp['title'];?>
                                    </p>
                                    <div class="product-buy">
                                        <p class="product-price">
                                            Цена: <?=$curr['symbol_left'];?> <?=$zp['old_price'] * $curr['value'];?> <?=$curr['symbol_right'];?> </p>
                                        <a class="btn btn-default add-to-cart-link" data-id="<?=$zp['id']?>" href="cart/add?id=<?=$zp['id']?>">
                                            Добавить в коризну
                                        </a>
                                    </div>                                </div><!-- /.prodact -->
                            </div>
                                <?php endforeach; ;?>
                        </div><!-- /.products-row -->
                        <?php endif; ;?>


                    </div><!-- /.content -->
                </div>
                <?php endif; ;?>

                <?php if(!empty($str)) : ;?>
                    <div class="row">
                        <div class="content">
                            <h3> Всё </h3>
                            <?php if(!empty($str)) : ;?>
                            <div class="products-row clearfix productsz">
                                    <?php $curr = \ya\App::$app->getProperty('currency'); ?>
                                    <?php foreach ($str as $zp) : ;?>
                                        <div class="col-sm-4 ">
                                            <div class="product ">

                                                <div class="product-img">
                                                    <a href="product/<?=$zp['alias'];?>">
                                                        <img src="img/<?=$zp['images'];?>" alt="">
                                                    </a>
                                                </div>
                                                <p class="product-title">
                                                    <a href="product/<?=$zp['alias'];?>"><?=$zp['name'];?></a>
                                                </p>
                                                <p class="product-desc">
                                                    <?=$zp['title_ranges'];?>
                                                </p>
                                                <div class="product-buy">
                                                    <p class="product-price">
                                                        Цена: <?=$curr['symbol_left'];?> <?=$zp['old_price'] * $curr['value'];?> <?=$curr['symbol_right'];?> </p>
                                                    <a data-id="<?=$zp['id_rang']?>" class="btn btn-default add-to-cart-link" href="cart/add?id=<?=$zp['id_rang']?>">
                                                        Добавить в коризну
                                                    </a>
                                                </div>                                </div><!-- /.prodact -->
                                        </div>
                                    <?php endforeach; ;?>
                            </div><!-- /.products-row -->
                            <?php endif; ;?>


                        </div><!-- /.content -->
                    </div>

                <?php endif; ;?>
            </div>

            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="row">
                        <div class="col-xs-6 col-md-12">
                            <div class="widget">
                                <h3>Фильтры</h3>
                                <ul>
                                    <div class="w_sidebar">
                                   <?php new \app\widgets\filter\Filter() ;?>
                                    </div>
<!--                                    <div class="cd-filter-block">-->
<!--                                        <h4>Radio buttons</h4>-->
<!---->
<!--                                        <ul class="cd-filter-content cd-filters list">-->
<!--                                            <li>-->
<!--                                                <input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked="">-->
<!--                                                <label class="radio-label" for="radio1">All</label>-->
<!--                                            </li>-->
<!---->
<!--                                            <li>-->
<!--                                                <input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">-->
<!--                                                <label class="radio-label" for="radio2">Choice 2</label>-->
<!--                                            </li>-->
<!---->
<!--                                            <li>-->
<!--                                                <input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">-->
<!--                                                <label class="radio-label" for="radio3">Choice 3</label>-->
<!--                                            </li>-->
<!--                                        </ul>
                              </div>-->

                                </ul>
                            </div><!-- /.widget -->
                        </div>
                    </div>


                </div><!-- /.sidebar -->
            </div>
        </div>
    </div>
</section>