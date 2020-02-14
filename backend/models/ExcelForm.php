<?php

namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class ExcelForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xls'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'file' => 'Excel Файл',
        ];
    }

    public function getValidateForm($forma)
    {
        return preg_replace('/ {2,}/',' ', str_replace(array("\n\r", "\n\r", "\n", "\n"), " ", trim($forma)));
    }
}