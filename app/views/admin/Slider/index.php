<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Слайдер</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>">Главная</a></li>
                    <li class="breadcrumb-item active">Слайдер</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Новость</th>
                                    <th>Текст новости</th>
                                    <th>Главный</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($slider as $sl)  :  ?>
                                    <tr>
                                        <td><?=$sl['id'];?></td>
                                        <td><?=$sl['news'];?></td>
                                        <td><?=$sl['text_news'];?></td>
                                        <td><?=$sl['active'];?></td>
                                        <td><a href="<?=ADMIN?>/slider/edit?id=<?=$sl['id'];?>"><i class="fa fa-fw fa-eye"></i></a>
                                            <a href="<?=ADMIN?>/slider/delete?id=<?=$sl['id'];?>" class="delete"><i class="fa fa-fw fa-safari text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->