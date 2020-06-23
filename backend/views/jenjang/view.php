<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Jenjang */

$this->title = $model->id_jenjang;
$this->params['breadcrumbs'][] = ['label' => 'Jenjangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenjang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_jenjang], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_jenjang], [
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
            'id_jenjang',
            'nama_jenjang',
        ],
    ]) ?>

</div>
