<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="container">

    <div class="row">

        <div class="col-md-9">
            <div class="row">
                <?php foreach ($newsList as $news): ?>
                    <article>
                        <a href="/news/view/<?php echo $news['id']?>"> <h3><?php echo $news['title']; ?></h3></a>
                        <br>
                        <br>
                        <?php echo $news['content']; ?>
                        <br>
                        <br>
                        <?php echo $news['date']; ?>
                        <hr>
                        <br>
                    </article>
                <?php endforeach; ?>
                <div id="pag"><?php echo $pagination->get(); ?></div>

            </div>
        </div>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
