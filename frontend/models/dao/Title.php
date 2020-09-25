<?php

namespace frontend\models\dao;

use yii\db\ActiveRecord;

class Title extends ActiveRecord
{
	public static function tableName()
	{
		return '{{title}}';
	}
}