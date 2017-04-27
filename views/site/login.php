
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'login';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1 translatable><?= Html::encode('login_lan') ?></h1>


<div class="container">
	<section class="content"> <?php $form = ActiveForm::begin([
        'id' => 'login',

     
    ]); ?>

   <h1 translatable>login_lan</h1>
    <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'translatable'=>'','placeholder'=>"ent_name_lan" ])->label(false) ?>
     <?= $form->field($model, 'password')->passwordInput( ['translatable'=>'', 'placeholder'=>"ent_pass_lan" ])->label(false) ?>
    <?= Html::submitButton('log_lan', [ 'name' => 'submit', 'translatable'=>'']) ?>

<a href="<?=Yii::$app->urlManager->createUrl(['site/email'])?>" translatable>lost_lan</a>
				<a href="<?=Yii::$app->urlManager->createUrl(['site/index'])?>" translatable>cansel_lan</a>  

    <?php ActiveForm::end(); ?>
</section>
</div>


  