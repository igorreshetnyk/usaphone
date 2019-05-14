
<div class="col-md-3">
    <p class="lead">Usaphones</p>
    <div class="list-group">
        <?php foreach ($categores as $categoryItem): ?>
            <a href="/category/<?php echo $categoryItem['id']; ?>/page-1" class="list-group-item">
                <?php echo $categoryItem['name']; ?></a>
            <?php endforeach; ?>
    </div>
</div>
