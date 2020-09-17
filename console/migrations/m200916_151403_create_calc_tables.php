<?php

use yii\db\Migration;

/**
 * Class m200916_151403_create_calc_tables
 */
class m200916_151403_create_calc_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('credit', [
            'id' => $this->primaryKey(),
            'start_date' => $this->text(),
            'month_count' => $this->integer(),
            'value' => $this->decimal(10,2),
            'percent' => $this->decimal(3,2)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('credit');
    }
}
