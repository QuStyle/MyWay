<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Category;

/** @var yii\web\View $this */
/** @var backend\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin([
        'id' => 'create_category',
        'options' => ['class' => 'form-create-category'],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent')->dropDownList(
//        Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        Category::getAllCategories(),
        ['prompt' => ['text' => Yii::t('app-form', 'Select parent'), 'options' => ['value' => 0]]]
    ) ?>

    <?= $form->field($model, 'order')->dropDownList(
        \backend\models\Category::getOrdersOpts()
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app-form', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
