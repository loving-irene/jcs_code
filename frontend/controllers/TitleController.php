<?php

namespace frontend\controllers;

use frontend\models\dao\Title;
use frontend\models\validator\TitleAddModel;
use frontend\models\validator\TitleUpdateModel;
use PHPUnit\Exception;
use yii\helpers\VarDumper;
use yii\web\Controller;

class TitleController extends Controller
{
	public function actionList()
	{
		return $this->render('list');
	}
	
	public function actionView()
	{
		$id = \Yii::$app->request->get('id');
		
		return $this->render('view', ['model' => $this->getOne($id)]);
	}
	
	public function getOne($id)
	{
		return Title::findOne(['id' => $id]);
	}
	
	public function actionAdd()
	{
		$model = new TitleAddModel();
		
		if (\Yii::$app->request->getMethod() == 'GET') {
			return $this->render('title-add', ['model' => $model]);
		} elseif (\Yii::$app->request->getMethod() == 'POST') {
			if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
				//写入数据库
				$dao = new Title();
				$dao->title = $model->getTitle();
				$dao->author = $model->getAuthor();
				$dao->date = $model->getDate();
				$dao->text = $model->getText();
				$dao->create_time = $model->getCreateTime();
				$dao->status = (int)$model->getStatus();
				
				if ($dao->save()) {
					$code = 'success';
					$message = '新增成功';
				} else {
					$code = 'error';
					$message = '新增失败';
				}
				\Yii::error(VarDumper::dumpAsString($model), 'demo');
				return $this->render('/notify/index', [
					'code'    => $code,
					'message' => $message
				]);
			} else {
				//报错
				$code = 'error';
				$message = '数据加载出错或校验未通过';
				\Yii::error(VarDumper::dumpAsString($model), 'demo');
				return $this->render('/notify/index', [
					'code'    => $code,
					'message' => $message
				]);
			}
		} else {
			$code = 'error';
			$message = '非GET/POST请求，请求方式：' . \Yii::$app->request->getMethod();
			return $this->render('/notify/index', ['code'    => $code,
												   'message' => $message
			]);
		}
	}
	
	public function actionUpdate()
	{
		if (\Yii::$app->request->getMethod() == 'GET') {
			$dao = $this->getOne(\Yii::$app->request->get('id'));
			
			return $this->render('title-update', ['model' => $dao]);
		} elseif (\Yii::$app->request->getMethod() == 'POST') {
			
			$model = new TitleUpdateModel();
			if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
				\Yii::error(VarDumper::dumpAsString(\Yii::$app->request->post()), 'demo');
				//写入数据库
				$dao = $this->getOne($model->getId());
				
				$dao->title = $model->getTitle();
				$dao->author = $model->getAuthor();
				$dao->date = $model->getDate();
				$dao->text = $model->getText();
				$dao->create_time = $model->getCreateTime();
				$dao->status = (int)$model->getStatus();
				
				if ($dao->save()) {
					$code = "success";
					$message = '更新成功';
				} else {
					$code = "error";
					$message = '更新失败';
				}
				\Yii::error(VarDumper::dumpAsString($dao), 'demo');
				
				return $this->render('/notify/index', [
					'code'    => $code,
					'message' => $message
				]);
			} else {
				//报错
				$code = 'error';
				$message = '数据加载出错';
				\Yii::error(VarDumper::dumpAsString($model), 'demo');
				
				return $this->render('/notify/index', [
					'code'    => $code,
					'message' => $message
				]);
			}
		} else {
			$code = 'error';
			$message = '非GET/POST请求，请求方式：' . \Yii::$app->request->getMethod();
			return $this->render('/notify/index', ['code'    => $code,
												   'message' => $message
			]);
		}
	}
}