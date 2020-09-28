<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "title".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $author
 * @property string|null $date
 * @property string|null $text
 * @property string|null $create_time
 * @property int|null $status
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'title';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'create_time'], 'safe'],
            [['text'], 'string'],
            [['status'], 'integer'],
            [['title', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'date' => 'Date',
            'text' => 'Text',
            'create_time' => 'Create Time',
            'status' => 'Status',
        ];
    }
}
