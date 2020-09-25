<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="post">
    <a href='<?= Url::toRoute(['title/view','id'=>Html::encode($model->id)]) ?>'><?= Html::encode($model->title) ?></a>
</div>
