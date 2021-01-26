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
                                        <a data-id="<?=$zp['id']?>" class="btn btn-default add-to-cart-link" href="cart/add?id=<?=$zp['id_rang']?>">
                                            Добавить в коризну
                                        </a>
                                    </div>
                                </div>
                                </div>
                                <?php endforeach; ;?>
 </div>
<?php else: ?>
    <h3>Товаров не найдено...</h3>
<?php endif; ?>
