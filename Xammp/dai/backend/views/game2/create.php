<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Game2 */

$this->title = 'Create Game2';
$this->params['breadcrumbs'][] = ['label' => 'Game2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
