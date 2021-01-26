<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Редактирование товара <?=$ranges->name;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>/product">Список ассортимента</a></li>
                    <li class="breadcrumb-item">Добавление ассортимент</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?=ADMIN;?>/product/edit" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Наименование товара</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Наименование товара" value="<?=h($ranges->name);?>" required/>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label for="category_id">Категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'category_id',
                                        'id' => 'category_id',
                                    ],
                                ]) ?>
                            </div>

                            <div class="form-group">
                                <label for="title">Описание</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Описание" value="<?=h($ranges->title);?>">
                            </div>

                            <div class="form-group has-feedback">
                                <label for="old_price">Цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?=h($ranges->old_price);?>" required data-error="Допускаются цифры и десятичная точка"/>
                                <div class="help-block with-errors"></div>
                            </div>
                            <?php new \app\widgets\filter\Filter($filter, WWW . '/filter/admin_filter_tpl.php'); ?>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <div class="card card-primary file-upload">
                                        <div class="card-header">
                                            <h3 class="card-title">Базовое изображение</h3>

                                            <div class="card-tools">

                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <div id="single" class="btn btn-success"  data-url="product/add-image" data-name="single">
                                                Выбрать файл
                                            </div>
                                            <p><small>Рекомендуемые размеры: 597 на 438 </small></p>
                                            <div style="cursor: pointer" class="single">
                                                <img src="/img/<?=$ranges->images;?>" alt="" style="max-height: 150px;" data-id="<?=$ranges->id;?>" data-src="<?=$ranges->images;?>" class="del-item">
                                            </div>

                                        </div>
                                        <!-- /.card-body -->
                                        <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div></div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="">
                                    <input type="checkbox" name="status" <?=$ranges->status ? 'checked' : null?>> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="">
                                    <input type="checkbox" name="hit" <?=$ranges->hit ? 'checked' : null?>>  Хит
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$ranges->id;?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->