<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php //include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-6">
            <div class="row">
                <h4>Корзина</h4>
                <?php if ($productInCart): ?>
                    <p>Вы выбрали такие товары:</p>
                    <table class="table table-bordered table-cart">
                        <tr>
                            <th>Код</th>
                            <th>Название</th>
                            <th>Стоимость</th>
                            <th>Количеcтво</th>
                            <th></th>
                        </tr>
                        <?php foreach ($prod as $product) : ?>
                            <tr>
                                <td>
                                    <?php echo $product['code']; ?>
                                </td>
                                <td>
                                    <a href="/product/<?php echo $product['id']; ?>">
                                        <?php echo $product['name']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $product['price']; ?>
                                </td>

                                <td>
                                    <?php echo $productInCart[$product['id']]; ?>
                                </td>
                                <td>
                                    <a class=""
                                       href="/cart/delete/<?php echo $product['id']; ?>">
                                        <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3">Общая стоимость</td>
                            <td colspan="3">
                                <?php echo $totalPrice; ?>
                            </td>
                        </tr>
                    </table>
                    <form action="cart/checkout/">
                        <button class="btn btn-success button-form">Оформить заказ</button>
                    </form>

                <?php else: ?>
                    <p>Корзина пуста</p>

                    <a class="" href="/"><i class=""></i> Вернуться к покупкам</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- END of content -->
<?php include ROOT . '/views/layouts/footer.php'; ?>