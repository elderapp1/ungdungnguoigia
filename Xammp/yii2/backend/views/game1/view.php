<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Game1 */

$this->title = $model->id_question;
$this->params['breadcrumbs'][] = ['label' => 'Game1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_question' => $model->id_question, 'id_user' => $model->id_user], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_question' => $model->id_question, 'id_user' => $model->id_user], [
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
            'id_question',
            'id_user',
            'status',
            'image',
            'A',
            'B',
            'C',
            'D',
            'answer',
            'correct',
            'wrong',
            'block',
            'created_at',
        ],
    ]) ?>

</div>
