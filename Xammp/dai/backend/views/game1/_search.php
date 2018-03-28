<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Game1_Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="game1-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_question') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'A') ?>

    <?php // echo $form->field($model, 'B') ?>

    <?php // echo $form->field($model, 'C') ?>

    <?php // echo $form->field($model, 'D') ?>

    <?php // echo $form->field($model, 'answer') ?>

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
