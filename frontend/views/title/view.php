<?php
use yii\widgets\DetailView;
?>

<?= DetailView::widget([
	'model'=>$model,
	'attributes'=>[
		'id',
		'title',
		'author',
		'date',
		'text',
		'create_time',
		'update_time',
		'status'
	],
]); ?>


