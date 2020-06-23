<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jawaban */

$this->title = $model->id_jawaban;
$this->params['breadcrumbs'][] = ['label' => 'Jawabans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jawaban-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jawaban], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jawaban], [
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
            'id_jawaban',
            'id_soal_jawaban',
            'deskripsi:ntext',
            'judul_jawaban',
            'jawaban',
        ],
    ]) ?>

</div>
