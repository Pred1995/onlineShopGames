<div class="carousel-inner" role="listbox">
    <?php foreach($slider as $sl)  : ;?>
        <div class="item <?php if($sl->active == 'active') echo ' active' ?>" >
            <div class="bg-slide" style="background-image: url(img/<?=$sl->images;?>)"></div>
            <div class="container">
                <div class="carousel-caption">
                    <h1><?=$sl->news;?></h1>
                    <h3><?=$sl->text_news;?></h3>
                    <a href="#" class="btn-red">Смотреть</a>
                </div>
            </div>
        </div>

    <?php endforeach; ;?>
</div>