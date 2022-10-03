<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%expenses}}`.
 */
class m221003_113604_create_expenses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%expenses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'type' => $this->string()->comment('Значение товар или услуга'), // значение товар или услуга
            'category' => $this->integer(),
            'count' => $this->integer(),
            'price' => $this->integer(),
            'date_create' => $this->timestamp(),
            'date_update' => $this->timestamp()
        ]);

        // add foreign key for table `category`
        $this->addForeignKey(
            'fk-expenses-category',
            'expenses',
            'category',
            'category',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `category`
        $this->dropForeignKey(
            'fk-expenses-category',
            'expenses'
        );

        $this->dropTable('{{%expenses}}');
    }
}
