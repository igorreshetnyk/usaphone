
<?php include ROOT . '/views/layouts/header.php'; ?>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <?php include ROOT . '/views/layouts/right_block.php'; ?>

        <div class="col-md-9">

            <div class="row carousel-holder">
<!--
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="/product/2">
                                    <img class="slide-image" src="<?php echo Product::getImage("1"); ?>" alt=""></a>
                            </div>
                            <?php foreach ((Product::getProductByRecomended()) as $one): ?>
                                <div class="item">
                                    <a href="/product/<?php echo $one['id']; ?>">
                                        <img class="slide-image" src="<?php echo Product::getImage($one['id']); ?>" alt=""></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>-->

            <div class="row">


                <?php foreach ($latestProduct as $product): ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="/product/<?php echo $product['id']; ?>">
                                <img src="<?php echo Product::getImage($product['id']); ?>" class="img-thumbnail" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right"><?php echo $product['price']; ?></h4>
                                <h4><a href="/product/<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
                                </h4>
                                <p><?php echo mb_substr($product['description'], 0, 55, 'UTF-8'); ?>...</p>
                                <button type="submit" data_id="<?php echo $product['id']; ?>" name="submit" class="btn btn-success add_to_cart">
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

            </div>
        </div>

    </div>

</div>
<!-- /.container -->

<?php include ROOT . '/views/layouts/footer.php'; ?>

<script src="/template/js/cartController.js"></script>