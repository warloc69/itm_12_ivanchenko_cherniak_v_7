<?php ?>
<div class="card">
    <input id="edit-comment-article-id" type="hidden" value="<?= $article->id ?>">

    <img class="card-img-top" src="/uploads/<?= $article->img ?>" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title"> <?= $article->title ?>  <span class="badge badge-info"> <?= $article->created ?></span></h5>
        <p class="card-text"> <?= $article->text ?></p>
    </div>
</div>