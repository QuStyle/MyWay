<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%expenses}}`.
 */
class m221004_071422_create_expenses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%expenses}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment('Название затрат'),
            'type' => $this->string(255)->comment('Тип затрат - товар или услуга'),
            'category' => $this->integer()->comment('Категория затрат'),
            'count' => $this->integer()->comment('Количество'),
            'price' => $this->integer()->comment('Цена'),
            'create_at' => $this->timestamp()->notNull()->defaultValue(new \yii\db\Expression('CURRENT_TIMESTAMP'))->comment('Дата добавления'),
            'update_at' => $this->timestamp()->null()->comment('Дата обновления'),
        ]);


        // add foreign key for table `expenses`
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
        // drops foreign key for table `expenses`
        $this->dropForeignKey(
            'fk-expenses-category',
            'expenses'
        );
        $this->dropTable('{{%expenses}}');
    }
}
