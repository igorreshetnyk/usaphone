<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="container">

    <div class="row">

        <div class="col-md-9">
            <div class="row">
<article>
    <h3><?php echo $newsItem['title']; ?></h3>
    <br>
    <br>
    <?php echo $newsItem['content']; ?>
    <br>
    <br>
    <?php echo $newsItem['date']; ?>
    <hr>
    <br>
</article>
<?php include ROOT . '/views/layouts/footer.php'; ?>
