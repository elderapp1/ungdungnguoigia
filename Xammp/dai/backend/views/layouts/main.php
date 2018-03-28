<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap bg-info">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-static-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
       echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 aside-left">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý người dùng', ['/user/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý newfeed', ['/newfeed/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý like', ['/likeinfo/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý Comment', ['/comment/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý game1', ['/game1/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý game2', ['/game2/index'], ['class' => 'btn btn-link']); ?>
                            </li>
                            <li class="list-group-item">
                                <?php echo Html::a('Quản lý tag', ['/tag/index'], ['class' => 'btn btn-link']); ?>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 admin-right">
                <div>
                    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
