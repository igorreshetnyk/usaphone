<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-9">

            <div class="row">

                <?php foreach ($categoryProduct as $product): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="/product/<?php echo $product['id']; ?>">
                                <img src="<?php echo Product::getImage($product['id']); ?>" class="img-thumbnail" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">$<?php echo $product['price']; ?></h4>
                                <h4><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </h4>
                                <p><?php echo substr($product['description'], 0, 85); ?>...</p>
                                <button type="submit" data_id="<?php echo $product['id']; ?>" name="submit"
                                        class="btn btn-success add_to_cart">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i> В корзину</button>

                                <?php if ($product['is_new']): ?>
                                    <p></p>
                                <?php endif; ?>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo Comment::countComent($product['id']) ?> reviews</p>
                                <p>
                                    <?php for ($i = 0; ($i < Product::getRating($product['id'])); $i++): ?>
                                        <span class="glyphicon glyphicon-star"></span>
                                    <?php endfor; ?>
                                    <?php for ($i = 0; ($i < (5 - Product::getRating($product['id']))); $i++): ?>
                                        <span class="glyphicon glyphicon-star-empty"></span>
                                    <?php endfor; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div id="pag"><?php echo $pagination->get(); ?></div>
            </div>

        </div>

    </div>

</div>
<!-- /.container -->

<?php include ROOT . '/views/layouts/footer.php'; ?>

<script src="/template/js/cartController.js"></script>