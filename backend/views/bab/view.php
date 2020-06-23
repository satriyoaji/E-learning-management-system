<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bab */

$this->title = $model->id_bab;
$this->params['breadcrumbs'][] = ['label' => 'Babs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bab-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_bab], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_bab], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_bab',
            'id_jenjang_bab',
            'id_pelajaran_bab',
            'deskripsi',
            'video',
        ],
    ]) ?>

</div>
