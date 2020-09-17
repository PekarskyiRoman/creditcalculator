<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "credit".
 *
 * @property int $id
 * @property string|null $start_date
 * @property int|null $month_count
 * @property float|null $value
 * @property float|null $percent
 */
class Credit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'credit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['start_date', 'month_count', 'value', 'percent'], 'required'],
            [['start_date'], 'string'],
            [['month_count'], 'integer'],
            [['value', 'percent'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'start_date' => 'Start Date',
            'month_count' => 'Credit period(months)',
            'value' => 'Value',
            'percent' => 'Percent',
        ];
    }
}
