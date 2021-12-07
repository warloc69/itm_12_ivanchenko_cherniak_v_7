<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Article extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload()
    {

        if ($this->validate(false)) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}