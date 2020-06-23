<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Soal */

$this->title = $model->id_soal;
$this->params['breadcrumbs'][] = ['label' => 'Soals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_soal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_soal], [
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
            'id_soal',
            'id_bab_soal',
            'deskripsi:ntext',
            'judul_soal',
            'soal',
        ],
    ]) ?>

</div>
