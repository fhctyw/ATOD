<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class UploadForm extends ActiveRecord
{
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
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' .Yii::$app->user->identity->id. '.'.date('His'));//ошибка
            $comm = Yii::$app->db->createCommand('UPDATE users SET url_photo = :url_photo WHERE id = :id');
            $filename = $this->imageFile->baseName . '.' .Yii::$app->user->identity->id . '.'.date('His');
            $comm->bindParam(':url_photo', $filename);
            $comm->bindParam(':id', Yii::$app->user->identity->id);
            $comm->execute();
            return true;
        } else {
            return false;
        }
    }
}