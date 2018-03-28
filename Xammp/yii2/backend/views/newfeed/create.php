<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Newfeed */

$this->title = 'Create Newfeed';
$this->params['breadcrumbs'][] = ['label' => 'Newfeeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newfeed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
