<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Likeinfo */

$this->title = $model->id_newfeed;
$this->params['breadcrumbs'][] = ['label' => 'Likeinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likeinfo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_newfeed' => $model->id_newfeed, 'id_user' => $model->id_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_newfeed' => $model->id_newfeed, 'id_user' => $model->id_user], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_newfeed',
            'id_user',
            'created_at',
        ],
    ]) ?>

</div>
