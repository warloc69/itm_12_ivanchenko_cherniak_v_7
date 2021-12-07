<?php ?>
    <div class="article-title-list list-group">
        <?php foreach ($articles as $article) { ?>
                <div class="at-list">
                    <img class="card-img-top" src="/uploads/<?= $article->img ?>" alt="Card image cap">
                    <div class="article-list-item list-group-item list-group-item-action"
                         data-id="<?= $article->id ?>"><?= $article->title ?></div>
                </div>
        <?php } ?>
    </div>