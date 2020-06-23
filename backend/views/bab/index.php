<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Babs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bab', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            [
				'attribute' => 'id_jenjang_bab',
				'value' => function($data){
					return $data->jenjangBab->nama_jenjang;
				}
			],
            [
				'attribute' => 'id_pelajaran_bab',
				'value' => function($data){
					return $data->pelajaranBab->nama_pelajaran;
				}
			],
            'deskripsi',
            'video',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
