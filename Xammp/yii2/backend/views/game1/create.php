<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Game1 */

$this->title = 'Create Game1';
$this->params['breadcrumbs'][] = ['label' => 'Game1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
