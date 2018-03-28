<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Newfeed */

$this->title = 'Update Newfeed: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Newfeeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_newfeed, 'url' => ['view', 'id_newfeed' => $model->id_newfeed, 'id_user' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="newfeed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
