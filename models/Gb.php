<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
class Gb extends ActiveRecord {
function strings_clear($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	return htmlspecialchars($string, ENT_QUOTES);
}
}
?>