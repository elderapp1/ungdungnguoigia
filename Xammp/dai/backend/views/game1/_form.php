<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Game1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'A')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'B')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'C')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'D')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correct')->textInput() ?>

    <?= $form->field($model, 'wrong')->textInput() ?>

    <?= $form->field($model, 'block')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
