<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Game2 */

$this->title = 'Update Game2: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Game2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_question, 'url' => ['view', 'id_question' => $model->id_question, 'id_user' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="game2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
