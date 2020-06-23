<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Artikel */

$this->title = 'Create Artikel';
$this->params['breadcrumbs'][] = ['label' => 'Artikels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artikel-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
