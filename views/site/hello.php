<?php 
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\widgets\helpers;
use yii\helpers\Html;
?>
<html>
<head>
<title>page 1 &lt; Guestbook</title>
<link rel="SHORTCUT ICON" href="img/icon.png" type="image/x-icon">
</head>
<body>
<div class='head'>
<div class='title'><h1 translatable>title_lan</h1></div>
<div class="lang"><a href=?en=1><button name="en"></button></a><a href=?ua=1>
<button  name="ua"></button></a>
  </form><br><br></div></div>
  <h2 translatable>new_lan</h2>
<table cellspacing="2" cellpadding="2" border="0">
 <?php $form = ActiveForm::begin(['options'=>[
   'enctype'=> 'multipart/form-data'],
    'id' => 'form'
   ]) ;
 ?>
<tr>
<td translatable>name_lan</td>
<td>
 <?= $form->field($model, 'name')->textInput(['name' =>'name'])->label('username') ?>
</td>
</tr><tr>
<td translatable>email_lan</td>
<td>
 <?= $form->field($model, 'email')->textInput(['name' =>'email'])->label(false) ?>
</span></td>
</tr><tr>
<td translatable>url_lan</td>
<td>
 <?= $form->field($model, 'www')->textInput(['name' =>'www'])->label(false) ?>
</td>
</tr><tr>
<td translatable>message_lan</td>
<td> 
<?= $form->field($model, 'message')->textArea(['name' =>'message'])->label(false) ?>

<div class="message" contenteditable="true"></div>
<span id=message></span><div class="tags">
 <span class="link" translatable>link</span>
 <span class="italic" translatable>italic</span>
 <span class="strike" translatable>strike</span>
 <span class="strong" translatable>strong</span>
</div><tr>
<td>&nbsp;</td>
<td><?=$form->field($model, 'image')->fileInput(['name'=>'image'])->label(false)?></td></tr>
<tr><td> <img src="/captcha/simple-php-captcha.php?_CAPTCHA&amp;t=0.58944200+1492773336" alt="CAPTCHA code"></td>
<td> <input type=text name="captcha" size=5 maxlength=5 ><span id=captcha></span></td></tr>
<tr><td>&nbsp;</td>
<td><?=Html::submitButton('add_lan', ['name'=>'sb', 'translatable'=>''])?></td>
</tr>
 <?php ActiveForm::end(); ?>
</table>






<?php
use yii\widgets\LinkPager;
?>
<?= LinkPager::widget(['pagination' =>  $pagination])?>
<div class="sort"><span translatable>sort_lan</span>
  <a href="<?=Yii::$app->urlManager->createUrl(['order'=>name, 'dir'=>up])?>" translatable>sort_name_lan</a>
  <a href="<?=Yii::$app->urlManager->createUrl(['order'=>email, 'dir'=>up])?>" translatable>sort_email_lan</a>
  <a href="<?=Yii::$app->urlManager->createUrl(['order'=>date, 'dir'=>up])?>" translatable>sort_date_lan</a>
  </div>
  <?php foreach ($posts as $post) {  ?>
  <div class=info><div class=cn>
  <b><?= $post->name?></b> (  <a href="mailto:<?= $post->email?>"><?= $post->email?></a> <?php if($post->www) {?> || <?= $post->name ?><?php }?> ) 
  <span translatable>write_lan</span><?= $post->datetime?></div>
  <div><?= $post->message?></div></div>
  <?php } ?>
  <?= LinkPager::widget(['pagination' =>  $pagination])?>
  <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/main.js"></script>-->