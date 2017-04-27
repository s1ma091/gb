<?php 
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\bootstrap\helpers;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\LinkPager;
?>
<html>
<head>
<title>page 1 &lt; Guestbook</title>
<link rel="SHORTCUT ICON" href="img/icon.png" type="image/x-icon">
</head>
<body>
<div class='head'>
<div class='title'><h1 translatable>title_lan</h1></div>

  <?php
   
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);

    ?>

<div class="lang"><button name="en"></button>
<button  name="ua"></button>

 <?php if($block) { ?>
  <br><br></div>
  <h2 translatable>new_lan</h2>
  <h2 style="color:green" translatable><?= $good ?></h2>
<table cellspacing="2" cellpadding="2" border="0">
 <?php $form = ActiveForm::begin(['id' => 'add-form','options'=>[
   'enctype'=> 'multipart/form-data'],
    
   ]) ;
 ?>
 <div class="main">
<tr>
<td translatable>name_lan</td>
<td>
 <?= $form->field($model, 'name')->label(false)?>
 <span id=name></span>
</td>
</tr><tr>
<td translatable>email_lan</td>
<td>
 <?= $form->field($model, 'email')->label(false)?>
<span id=email></span></td>
</tr><tr>
<td translatable>url_lan</td>
<td>
 <?= $form->field($model, 'www')->textInput()->label(false) ?>
</td>
</tr><tr>
<td translatable>message_lan</td>
<td> 
<?= $form->field($model, 'message')->label(false)?>

<div class="message" contenteditable="true"><?= $model->message ?></div>
<span id=message></span><div class="tags">
 <span class="link" translatable>link</span>
 <span class="italic" translatable>italic</span>
 <span class="strike" translatable>strike</span>
 <span class="strong" translatable>strong</span>
</div><tr>
<td>&nbsp;</td>
<td><?=$form->field($model, 'img')->fileInput()->label(false)?></td></tr>

<?= $form->field($model, 'verifyCode')->label(false)->widget(Captcha::className(), [
                        'template' => '<tr><td>{image}</td><td>{input}',
                    ]) ?>
                   </td></tr>
<tr><td>&nbsp;</td>

<td><?=Html::submitButton('add_lan', ['name'=>'sb', 'translatable'=>''])?></td>
</tr>
</div>
 <?php ActiveForm::end();  ?>
 
</table>
 <?php } else {  ?>
<div>You Block</div>
 <?php } ?>






<?= LinkPager::widget(['pagination' =>  $pagination])?>
<div class="sort"><span translatable>sort_lan</span>
  <a href="<?=Yii::$app->urlManager->createUrl(['order'=>name, 'dir'=>$_GET['dir'] === 'up' ? 'down' : 'up'])?>" translatable>sort_name_lan</a>
  <a href="<?=Yii::$app->urlManager->createUrl(['order'=>email, 'dir'=>$_GET['dir'] === 'up' ? 'down' : 'up'])?>" translatable>sort_email_lan</a>
  <a href="<?=Yii::$app->urlManager->createUrl(['order'=>date, 'dir'=>$_GET['dir'] === 'up' ? 'down' : 'up'])?>" translatable>sort_date_lan</a>
  </div>
  <?php foreach ($posts as $post) {  ?>
  <div class=info><div class=cn>
  <b><?= $post->name?></b> (  <a href="mailto:<?= $post->email?>"><?= $post->email?></a> <?php if($post->www) {?> || <a href="<?= $post->www ?>"><?= $post->www ?></a><?php }?> ) 
  <span translatable>write_lan</span><?= $post->datetime?></div>
  <div><?= htmlspecialchars_decode($post->message)?></div>
  <?php if($post->img) { ?><img class="image" src="<?=$post->img?>"/><?php } ?>
  </div>
<?php if(Yii::$app->user->identity->username == 'admin') { ?>
 <div class="del">[ <a href="<?=Yii::$app->urlManager->createUrl(['del'=>$post->id])?>" translatable>delete_lan</a> ]</div>
 <div class="del">[ <a href="<?=Yii::$app->urlManager->createUrl(['block'=>$post->ip])?>" translatable>block_lan</a> ]</div>
  <?php } }?>

  <?= LinkPager::widget(['pagination' =>  $pagination])?>
    </div>
