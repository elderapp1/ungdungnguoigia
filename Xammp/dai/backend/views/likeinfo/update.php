<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Likeinfo */

$this->title = 'Update Likeinfo: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Likeinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_newfeed, 'url' => ['view', 'id_newfeed' => $model->id_newfeed, 'id_user' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="likeinfo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
