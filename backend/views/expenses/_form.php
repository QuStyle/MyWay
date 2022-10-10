<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Category;

/** @var yii\web\View $this */
/** @var frontend\models\Expenses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="expenses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
            ['товар' => 'товар', 'услуга' => 'услуга']
    ) ?>

    <?= $form->field($model, 'category')->dropDownList(
        Category::find()->select(['name', 'id'])->indexBy('id')->column(),
        ['prompt' => ['text' => Yii::t('app-form', 'Select category'), 'options' => ['disabled' => true, 'label' => Yii::t('app-form', 'Select category')]]        ]
    ) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
