<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
class AddForm extends Model
{
    public $name;
    public $datetime;
    public $email;
    public $www;
    public $message;
    public $img;
    public $verifyCode;
    public $browser;
    public $ip;

 public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'message'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['www', 'url'],
           [['img'], 'file', 'extensions' => 'png, jpg'],
            // verifyCode needs to be entered correctly
           ['verifyCode', 'captcha'],
        ];
    }

     public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }



}