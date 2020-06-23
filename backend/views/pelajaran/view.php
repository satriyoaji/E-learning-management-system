<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pelajaran */

$this->title = $model->id_pelajaran;
$this->params['breadcrumbs'][] = ['label' => 'Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelajaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pelajaran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pelajaran], [
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
            'id_pelajaran',
            'id_jenjang_pelajaran',
            'nama_pelajaran',
        ],
    ]) ?>

</div>
