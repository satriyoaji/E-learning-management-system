<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PelajaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelajarans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelajaran-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pelajaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute' => 'id_jenjang_pelajaran',
				'value' => function($data){
					return $data->jenjangPelajaran->nama_jenjang;
				}
			],
            'nama_pelajaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
