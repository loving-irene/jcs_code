<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form=ActiveForm::begin();

?>
<?= $form->field($model,'id')->hiddenInput()->label(false) ?>
<?= $form->field($model,'title') ?>
<?= $form->field($model,'author') ?>
<?= $form->field($model,'date')?>
<?= $form->field($model,'text')->textarea()->hint('输入文章内容') ?>
<?= $form->field($model,'create_time') ?>
<?= $form->field($model,'status') ?>

<div class="form-group">
	<div class="col-lg-offset-1 col-lg-11">
		<?= Html::submitButton('提交',['class'=>'btn btn-primary']) ?>
	</div>
</div>
<?php ActiveForm::end();?>

