<?php

namespace app\controllers;


use Yii;
use yii\base\BaseObject;
use yii\web\Controller;
use app\models\Article;
use yii\web\UploadedFile;

class ArticleController extends Controller
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
        $id = $request->get('id');
        $article = Article::findOne($id);
        return  $this->renderPartial('index',[ 'article' =>  $article]);
    }

    public function actionSearch()
    {
        $request = Yii::$app->request;
        $search = $request->get('search');
        $articles = Article::find()->where(['like', 'text', $search ])->all();
        return $this->renderPartial('search', ['articles' => $articles]);

    }


    public function actionAdd() {
        return  $this->render('add');
    }

    public function actionCreate() {
        $request = Yii::$app->request;
        $title = $request->post('title');
        $text = $request->post('text');
        $user_id = $request->post('user_id');

        $articleImage = new Article();
        $articleImage->imageFile = UploadedFile::getInstance($articleImage, 'imageFile');
        $articleImage->upload();
        $article = new Article();
        $article->title = $title;
        $article->img = $articleImage->imageFile->baseName . '.' . $articleImage->imageFile->extension;
        $article->text = $text;
        $article->user_id = $user_id;
        $article->save(false);
        return $this->asJson(['status' => 'ok']);
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
