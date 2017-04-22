<link rel="stylesheet" href="css/style.css">
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>


<div class="container">
	<section class="content"> <?php $form = ActiveForm::begin([
        'id' => 'login',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

   <h1 translatable>login_lan</h1>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'translatable'=>'','name'=>"uname", 'placeholder'=>"ent_name_lan" ]) ?>
     <?= $form->field($model, 'password')->textInput( ['translatable'=>'','name'=>"psw", 'placeholder'=>"ent_pass_lan" ]) ?>
    <?= Html::submitButton('log_lan', [ 'name' => 'submit', 'translatable'=>'']) ?>

<a href="email.php" translatable>lost_lan</a>
				<a href="index.php" translatable>cansel_lan</a>  

    <?php ActiveForm::end(); ?>
</section>
</div>


  