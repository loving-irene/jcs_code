<?php

use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\models\demo\Title;

$dataProvider=new ActiveDataProvider([
	'query'=>Title::find(),
	'pagination'=>[
		'pageSize'=>5,
	],
]);
?>

<?= ListView::widget([
	'dataProvider'=>$dataProvider,
	'itemView'=>'_post',
]) ?>