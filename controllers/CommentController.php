<?php

namespace app\controllers;

use app\models\Article;
use app\models\Comment;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class CommentController extends Controller
{
    public function beforeAction($action)
    {
        if (in_array($action->id, ['create', 'update'])) {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $request = Yii::$app->request;
        $articleId = $request->get('article_id');
        $comments = Comment::find()
            ->where(['article_id' => $articleId])
            ->all();
        return  $this->renderPartial('index',[ 'comments' =>  $comments]);
    }

    public function actionCreate() {
        $request = Yii::$app->request;
        $article_id = $request->post('article_id');
        $text = $request->post('text');
        $user_id = $request->post('user_id');
        $comments = new Comment();
        $comments->text = $text;
        $comments->article_id = $article_id;
        $comments->user_id = $user_id;
        $comments->save();
        return  $this->renderPartial('index',[ 'comments' =>  [$comments]]);
    }

    public function actionUpdate() {
        $request = Yii::$app->request;
        $title = $request->post('title');
        $text = $request->post('text');
        $id = $request->post('id');

        $article = Article::findOne($id);

        $article->title = $title;
        $article->text = $text;

        $article->save();
    }
}
