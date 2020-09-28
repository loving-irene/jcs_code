<?php

namespace api\modules\v1\controllers;

use api\models\Title;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class TitleController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;
	
	private $code = 200;
	private $message = 'success';
	private $data = null;
	
	
	public function actionIndex()
	{
		$query = Title::find();
		$titles = $query->all();
		$arr = [];
		foreach ($titles as $title) {
			$arr[] = $title->toArray();
		}
		$this->data = $arr;
		return [
			'code'    => $this->code,
			'message' => $this->message,
			'data'    => $this->data
		];
	}
	
	public function actionCreate()
	{
		//接收并格式化数据
		$data = \Yii::$app->request->getRawBody();
		$data = Json::decode($data);
		
		//构建DAO
		$dao = new \frontend\models\dao\Title();
		$dao->title = ArrayHelper::getValue($data, 'title', null);
		$dao->author = ArrayHelper::getValue($data, 'author', null);
		$dao->date = date('Y-m-d', time());
		$dao->text = ArrayHelper::getValue($data, 'text', null);
		$dao->create_time = date('H:m:s', time());
		$dao->status = mt_rand(1, 3);
		
		//插入
		$res = $dao->save();
		
		//异常处理
		if (!$res) {
			\Yii::error(VarDumper::dumpAsString($res));
			throw new Exception('新增出错');
		}
		$this->data = $dao->toArray();
		return [
			'code'    => $this->code,
			'message' => $this->message,
			'data'    => $this->data
		];
	}
	
	public function actionView($id)
	{
		$this->data = Title::findOne(['id' => $id])->toArray();
		
		return [
			'code'    => $this->code,
			'message' => $this->message,
			'data'    => $this->data,
		];
	}
	
	public function actionUpdate($id)
	{
		//接收并格式化数据
		$data = \Yii::$app->request->getRawBody();
		$data = Json::decode($data);
		
		$title = Title::findOne(['id' => $id]);
		
		$title->title = $data['title'];
		$title->author = $data['author'];
		$title->text = $data['text'];
		$title->date = $data['date'];
		
		$res = $title->save();
		$this->data = $title->toArray();
		//异常处理
		if (!$res) {
			\Yii::error(VarDumper::dumpAsString($title));
			throw new Exception('新增出错');
		}
		
		return [
			'code'    => $this->code,
			'message' => $this->message,
			'data'    => $this->data
		];
	}
	
	public function actionDelete($id)
	{
		$title = Title::findOne(['id' => $id]);
		$this->data = $title->delete();
		
		if (!$this->data) {
			\Yii::error(VarDumper::dumpAsString($title));
			throw new Exception('新增出错');
		}
		
		return [
			'code'    => $this->code,
			'message' => $this->message,
			'data'    => $this->data
		];
	}
}
