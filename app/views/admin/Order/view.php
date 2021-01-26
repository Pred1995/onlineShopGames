<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Заказ № <?=$order['id'];?>
                    <?php if(!$order['status']) : ?>
                        <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn-success btn-xs">Подтвердить</a>
                    <?php else:?>
                        <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn-default btn-xs">Вернуть на доработку</a>
                    <?php endif;?>
                    <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn-danger btn-xs delete">Удалить</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN?>/order">Список заказов</a></li>
                    <li class="breadcrumb-item active">Заказ № <?=$order['id'] ;?></li>
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
                                <tbody>
                                    <tr>
                                        <td>Номер заказа</td>
                                        <td><?=$order['id'];?></td>
                                    </tr>
                                <tr>
                                    <td>Дата заказа</td>
                                    <td><?=$order['date'];?></td>
                                </tr>
                                    <tr>
                                        <td>Дата изменения</td>
                                        <td><?=$order['update_at'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Кол-во позиций в заказе</td>
                                        <td><?=count($order_product);?></td>
                                    </tr>
                                    <tr>
                                        <td>Сумма заказа</td>
                                        <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Имя заказчика</td>
                                        <td><?=$order['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Статус</td>
                                        <td><?=$order['status'] ? 'Завершен' : 'Новый';?></td>
                                    </tr>
                                    <tr>
                                        <td>Комментарий</td>
                                        <td><?=$order['note']?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <h3>
                Детали заказа
            </h3>
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
                                <th>Кол-во</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty= 0; foreach ($order_product as $product) :?>
                            <tr>
                                <td><?=$product->id;?></td>
                                <td><?=$product->title;?></td>
                                <td><?=$product->qty; $qty += $product->qty?></td>
                                <td><?=$product->price;?></td>
                            </tr>
                            <?php endforeach;?>
                            <tr class="active">
                                <td colspan="2">
                                <b>Итого:</b>
                                </td>
                                <td><b><?=$qty;?></b></td>
                                <td><b><?=$order['sum'];?> <?=$order['currency'];?></b></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->