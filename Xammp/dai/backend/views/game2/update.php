<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Game2 */

$this->title = 'Update Game2: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Game2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="game2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
