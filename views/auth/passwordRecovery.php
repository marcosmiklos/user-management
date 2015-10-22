<?php

use webvimark\modules\UserManagement\UserManagementModule;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var webvimark\modules\UserManagement\models\forms\PasswordRecoveryForm $model
 */

$this->title = UserManagementModule::t('front', 'Password recovery');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-info col-md-offset-4 col-md-4">
    <div class="panel-body">
<div class="  " style="background-color: #FFF;">

	<h2 class="text-center"><?= $this->title ?></h2>

	<?php if ( Yii::$app->session->hasFlash('error') ): ?>
		<div class="alert-alert-warning text-center">
			<?= Yii::$app->session->getFlash('error') ?>
		</div>
	<?php endif; ?>

	<?php $form = ActiveForm::begin([
		'id'=>'user',
		'layout'=>'horizontal',
		'validateOnBlur'=>false,
	]); ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => 255, 'autofocus'=>true]) ?>

	<?= $form->field($model, 'captcha')->widget(Captcha::className(), [
		'template' => '<div class="row"><div class="col-sm-3">{image}</div><div class="col-md-offset-3 col-sm-6">{input}</div></div>',
		'captchaAction'=>['/user-management/auth/captcha']
	]) ?>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<?= Html::submitButton(
				'<span class="glyphicon glyphicon-ok"></span> ' . UserManagementModule::t('front', 'Recover'),
				['class' => 'btn btn-primary']
			) ?>
                        <?= Html::a(
				'<span class="glyphicon glyphicon-arrow-left"></span> ' . UserManagementModule::t('front', 'Voltar'),
                                ['auth/login'],
				['class' => 'btn btn-default']
			) ?>
		</div>
	</div>

	<?php ActiveForm::end(); ?>

</div>
</div>
</div>