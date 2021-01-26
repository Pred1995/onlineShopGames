<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Список пользователей</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список пользователей</li>
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
                                    <th>Логин</th>
                                    <th>Email</th>
                                    <th>Имя</th>
                                    <th>Роль</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php  foreach ($users as $user)  :  ?>

                                    <tr>
                                        <td><?=$user->id;?></td>
                                        <td><?=$user->login;?></td>
                                        <td><?=$user->email;?></td>
                                        <td><?=$user->name;?></td>
                                        <td><?=$user->role;?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>(<?=count($users); ?> польз из <?=$count ;?> )</p>
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