<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Game2 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game2-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'true_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wrong_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'answer')->textInput() ?>

    <?= $form->field($model, 'correct')->textInput() ?>

    <?= $form->field($model, 'wrong')->textInput() ?>

    <?= $form->field($model, 'block')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
