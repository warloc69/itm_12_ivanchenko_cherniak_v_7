<?php
$this->title = 'Car blog';
?>

<div class="site-index">
    <div class="article">
        <div class="article-list">
            <div class="article-title-list list-group">
                <?php foreach ($articles as $article) { ?>
                        <div class="at-list">
                            <img class="card-img-top" src="/uploads/<?= $article->img ?>" alt="Card image cap">
                            <div class="article-list-item list-group-item list-group-item-action"
                                 data-id="<?= $article->id ?>"><?= $article->title ?></div>
                        </div>
                <?php } ?>
            </div>
        </div>
        <div class="article-container">
            <div class="article-body">
                <?php if (!empty($article)) { ?>
                    <div class="card">
                        <input id="edit-comment-article-id" type="hidden" value="<?= $articles[0]->id ?>">
                        <img class="card-img-top" src="/uploads/<?= $articles[0]->img ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $articles[0]->title ?></h5>
                            <p class="card-text"> <?= $articles[0]->text ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="comment-body">
                <?php foreach ($comments as $comment) { ?>
                    <div class="comment-list-item" comment-id="<?= $comment->id ?>"><?= $comment->text ?></div>
                <?php } ?>
            </div>
            <div class="add-comment-container">
                <h4>Add Comment</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"></span>
                    </div>
                    <textarea id="edit-comment-text" class="form-control" aria-label="With textarea"></textarea>
                </div>
                <div class="input-group">
                    <button type="button" class="btn btn-primary" id="save-comment">
                        Add Comment
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create article</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="add-article">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" name="Article[imageFile]" for="inputGroupFile01">Choose
                                image</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="edit-article-title" type="text" class="form-control" placeholder="Title"
                               aria-label="Title" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"></span>
                        </div>
                        <textarea id="edit-article-text" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save-article">Save changes</button>
            </div>
        </div>
    </div>
</div>
