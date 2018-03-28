<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Game2_Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Game2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game2-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Game2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_question',
            'id_user',
            'true_location',
            'wrong_location',
            'imag',
            //'answer',
            //'correct',
            //'wrong',
            //'block',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
