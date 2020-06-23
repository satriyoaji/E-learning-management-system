<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Murids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Murid', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'password',
            'email:email',
            'id_murid_jenjang',
            //'foto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
