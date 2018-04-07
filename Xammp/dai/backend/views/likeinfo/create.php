<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Likeinfo */

$this->title = 'Create Like Info';
$this->params['breadcrumbs'][] = ['label' => 'Like Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="like-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
