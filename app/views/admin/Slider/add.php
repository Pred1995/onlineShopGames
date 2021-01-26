<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Добавление слайдера</h1>
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
                <form action="<?=ADMIN;?>/slider/add" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="name">Новость</label>
                            <input type="text" name="news"  class="form-control" id="name" placeholder="Новость" value="<?php isset($_SESSION['form_data']['news']) ? h($_SESSION['form_data']['news']) : null;?>" required/>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            <div class="help-block with-errors"></div>
                        </div>

                        <div class="form-group">
                            <label for="title">Описание новости</label>
                            <input type="text" name="text_news" class="form-control" id="title" placeholder="Описание" value="<?php isset($_SESSION['form_data']['text_news']) ? h($_SESSION['form_data']['text_news']) : null;?>">
                        </div>

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
                                       <div id="single" class="btn btn-success"  data-url="slider/add-image" data-name="single">
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
                                <input type="checkbox" name="active" > Активный
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