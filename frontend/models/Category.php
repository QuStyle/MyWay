<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent
 * @property int|null $order
 *
 * @property Expenses[] $expenses
 */
class Category extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%category}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent', 'order'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => Yii::t('app-form','Name'),
            'parent' => Yii::t('app-form','Parent category'),
            'order' => Yii::t('app-form','Order'),
        ];
    }

    /**
     * @return array options for dropDownList properties Orders
     */
    public static function getOrdersOpts(){
        $res = null;
        for($i = 10; $i > 0; $i--){
            $res[$i] = $i;
        }
        return $res;
    }

    /**
     * Gets query for [[Expenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpenses()
    {
        return $this->hasMany(Expenses::class, ['category' => 'id']);
    }
}
