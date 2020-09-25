<?php

namespace frontend\models\validator;

use yii\base\Model;

class TitleUpdateModel extends Model
{
	public $id;
	public $title;
	public $author;
	public $date;
	public $text;
	public $create_time;
	public $status;
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($value)
	{
		$this->id = $value;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	
	public function setStatus($value)
	{
		$this->status = $value;
	}
	
	public function getCreateTime()
	{
		return $this->create_time;
	}
	
	public function setCreateTime($value)
	{
		$this->create_time = $value;
	}
	
	public function getText()
	{
		return $this->text;
	}
	
	public function setText($value)
	{
		$this->text = $value;
	}
	
	public function getDate()
	{
		return $this->date;
	}
	
	public function setDate($value)
	{
		$this->date = $value;
	}
	
	public function getTitle()
	{
		return $this->title;
	}
	
	public function setTitle($value)
	{
		$this->title = $value;
	}
	
	public function getAuthor()
	{
		return $this->author;
	}
	
	public function setAuthor($value)
	{
		$this->author = $value;
	}
	
	/**
	 * 设置可更新字段，设置了才能更新
	 *
	 * @return array|string[]
	 */
	public function safeAttributes()
	{
		return ['id','title','author','date','text','create_time','status'];
	}
	
	/**
	 * 设置提交的key，load() 时需要用到，使用 POST 方式提交的数据格式如下
	 * $_POST=[
	 *   '_csrf-frontend'=>'xx',
	 *   'Title'=>[
	 *   	'id'=>1, #这里是提交的数据
	 * 		 ...
	 *   ]
	 * ]
	 *
	 * @return string
	 */
	public function formName()
	{
		return 'Title';
	}
	
	public function rules()
	{
		return [
			[['date'],'date','format'=>'y-MM-dd'],
			[['create_time'],'time','format'=>'H:m:s']
		];
	}
}