<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Game2_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game2-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'true_location') ?>

    <?= $form->field($model, 'wrong_location') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'answer') ?>

    <?php // echo $form->field($model, 'correct') ?>

    <?php // echo $form->field($model, 'wrong') ?>

    <?php // echo $form->field($model, 'block') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
