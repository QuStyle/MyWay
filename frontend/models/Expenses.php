<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property int $id
 * @property string|null $name Название затрат
 * @property string|null $type Тип затрат - товар или услуга
 * @property int|null $category Категория затрат
 * @property int|null $count Количество
 * @property int|null $price Цена
 * @property string $create_at Дата добавления
 * @property string|null $update_at Дата обновления
 *
 * @property Category $category0
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%expenses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'count', 'price'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name', 'type'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Название затрат'),
            'type' => Yii::t('app', 'Тип затрат - товар или услуга'),
            'category' => Yii::t('app', 'Категория затрат'),
            'count' => Yii::t('app', 'Количество'),
            'price' => Yii::t('app', 'Цена'),
            'create_at' => Yii::t('app', 'Дата добавления'),
            'update_at' => Yii::t('app', 'Дата обновления'),
        ];
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'category']);
    }

    /**
     * {@inheritdoc}
     * @return ExpensesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpensesQuery(get_called_class());
    }
}
