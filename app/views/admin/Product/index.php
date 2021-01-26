<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Ассортимент</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>">Главная</a></li>
                    <li class="breadcrumb-item active">Ассортимент</li>
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
                                    <th>Наименование</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($ranges as $rang)  :  ?>
                                    <tr>
                                        <td><?=$rang['id'];?></td>
                                        <td><?=$rang['name'];?></td>
                                        <td><?=$rang['old_price'];?></td>
                                        <td><?=$rang['status'] ? 'On' : 'Off';?></td>
                                        <td><a href="<?=ADMIN?>/product/edit?id=<?=$rang['id'];?>"><i class="fa fa-fw fa-eye"></i></a>
                                            <a href="<?=ADMIN?>/product/delete?id=<?=$rang['id'];?>" class="delete"><i class="fa fa-fw fa-safari text-danger"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?=count($ranges); ?> ассортимента из <?=$count ;?> )</p>
                            <?php if($pagination->countPages > 1) : ?>
                                <?=$pagination; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->