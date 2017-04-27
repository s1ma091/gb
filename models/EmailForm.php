<?php
namespace app\models;
use Yii;
use yii\base\Model;
class EmailForm extends Model
{
    public $email;
    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'email'],
        ];
    }
public function contact($email)
    {
        if ($this->validate() && $email == Yii::$app->params['adminEmail']) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom($email)
                ->setSubject('Your password')
                ->setTextBody(User::$users['100']['password'])
                ->send();
          return true;
        }
        return false;
    }
}
