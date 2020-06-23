<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\Session;
$session = Yii::$app->session;
$session->open();
/* @var $this yii\web\View */
/* @var $searchModel backend\models\JenjangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenjangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenjang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!-- <h2><?= $session['admin']; ?></h2> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jenjang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nama_jenjang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
