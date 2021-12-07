<ul class="list-group">
    <?php foreach ($comments as $comment) { ?>
    <li class="list-group-item">
        <div class="comment-list-item" comment-id="<?= $comment->id ?>"><span class="badge badge-pill badge-warning">-></span><?= $comment->text ?></div>
    </li>
    <?php } ?>
</ul>
