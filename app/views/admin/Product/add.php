<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Добавление ассортимента</h1>
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
                <form action="<?=ADMIN;?>/product/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="name">Наименование товара</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Наименование товара" value="<?php isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : null;?>" required/>
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
                                'prepend' => '<option>Выберите категорию</option>',
                            ]) ?>
                        </div>

                        <div class="form-group">
                            <label for="title">Описание</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Описание" value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null;?>">
                        </div>

                        <div class="form-group has-feedback">
                            <label for="old_price">Цена</label>
                            <input type="text" name="old_price" class="form-control" id="old_price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?php isset($_SESSION['form_data']['old_price']) ? h($_SESSION['form_data']['old_price']) : null;?>" required data-error="Допускаются цифры и десятичная точка"/>
                            <div class="help-block with-errors"></div>
                        </div>
                        <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php'); ?>
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
                                       <div class="single"></div>

                                   </div>
                                   <!-- /.card-body -->
                                   <div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div></div>
                           </div>
                        </div>


                        <div class="form-group">
                            <label for="">
                                <input type="checkbox" name="status" checked> Статус
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="">
                                <input type="checkbox" name="hit"> Хит
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
            </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->