<?php foreach ($comments as $comment) { ?>
    <div class="comment-list-item" comment-id="<?= $comment->id ?>"><?= $comment->text ?></div>
<?php } ?>