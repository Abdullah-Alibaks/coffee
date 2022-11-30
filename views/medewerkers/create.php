<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Medewerkers $model */

$this->title = 'Create Medewerkers';
$this->params['breadcrumbs'][] = ['label' => 'Medewerkers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medewerkers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
