<?php

use yii\db\Migration;
use Faker\Factory;

/**
 * Class m200921_092431_create_table_title
 */
class m200921_092431_create_table_title extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('title', [
			'id'          => $this->primaryKey(),
			'title'       => $this->string(),
			'author'      => $this->string(),
			'date'        => $this->date(),
			'text'        => $this->text(),
			'create_time' => $this->time(),
			'status'      => $this->integer(),
		]);
		
		$faker = Factory::create();
		$column = [
			'title',
			'author',
			'date',
			'text',
			'create_time',
			'status'
		];
		
		$arr = [];
		$time = 10;
		for ($i = 0; $i < $time; $i++) {
			$arr[] = [
				$faker->sentence(),
				$faker->name(),
				$faker->date(),
				$faker->text(),
				$faker->time(),
				$faker->randomElement([
					1,
					2,
					3
				])
			];
		}
		
		$this->batchInsert('title', $column, $arr);
	}
	
	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('title');
	}
	
	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m200921_092431_create_table_title cannot be reverted.\n";

		return false;
	}
	*/
}
