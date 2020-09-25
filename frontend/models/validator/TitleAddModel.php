<?php

namespace frontend\models\validator;

use yii\base\Model;

class TitleAddModel extends Model
{
	public $title;
	public $author;
	public $date;
	public $text;
	public $create_time;
	public $status;
	public $id;
	
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
	
	public function safeAttributes()
	{
		return ['id','title','author','date','text','create_time','status'];
	}
	
	
	public function rules()
	{
		return [
			[['title','author','date','text','create_time','status'],'required'],
			[['date'],'date','format'=>'y-MM-dd'],
			[['create_time'],'time','format'=>'H:m:s']
		];
	}
}