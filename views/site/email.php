 <?php
 use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'email';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(!$success) {  ?>
 <h1 translatable><?= Html::encode('lost_email_lan') ?></h1>

<div class="container">
	<section class="content"><?php $form = ActiveForm::begin([ 
         'id' => 'email',

    ]);
        ?>
   <h1 translatable>lost_email_lan</h1>

  <?= $form->field($email, 'email')->textInput([
  'autofocus' => true])->label(false) ?>
  <?= Html::submitButton('send_lan', [ 'id' => 'email-form', 'translatable'=>'']) ?>
  <div class="err"><?= $err ?></div>
   	<a href="<?=Yii::$app->urlManager->createUrl(['site/login'])?>" translatable>cansel_lan</a> 

 <?php ActiveForm::end(); ?>
</section>
</div>
<?php } else { ?>
<div style="color:green; font-size: 20px"><?= $success ?> 	<a href="<?=Yii::$app->urlManager->createUrl(['site/login'])?>" translatable>cansel_lan</a> </div>
<?php }?>
