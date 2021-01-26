<div class="container container-content clearfix">

    <div class="patterns-wrapper">
        <div class="catalog">
            <?php if($hits): ?>
            <?php foreach($hits as $hit): ?>
            <a href="product/<?=$hit->alias;?>" class="catalog-item">
                <div class="catalog-image"><img src="img/<?=$hit->images?>" alt="Aviator-mockup" height="250px" width="380px"></div>
                <div class="description">
                    <div class="description-title"><?=$hit->name?></div><br>
                    <div class="description-p"><?=$hit->title?></div>
                    <div class="btn-buy btn-red"><?=$hit->old_price?></div>
                </div>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="buttons-wrapper">
            <button class="page-btn page-btn-active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button style="padding-top:12px;padding-bottom:12px" class="next-btn">Следующая</button>
        </div>
    </div>