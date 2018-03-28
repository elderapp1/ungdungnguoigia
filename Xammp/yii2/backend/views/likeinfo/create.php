<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Likeinfo */

$this->title = 'Create Likeinfo';
$this->params['breadcrumbs'][] = ['label' => 'Likeinfos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="likeinfo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
