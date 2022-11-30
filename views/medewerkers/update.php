<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medewerkers $model */

$this->title = 'Update Medewerkers: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Medewerkers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medewerkers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
