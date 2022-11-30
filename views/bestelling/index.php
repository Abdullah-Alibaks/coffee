<?php

use app\models\Bestelling;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
//dd($medewerkers);

/** @var yii\web\View $this */
/** @var app\models\BestellingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$medewerkersList = ArrayHelper::map($medewerkers,'id','name');
$menuList = ArrayHelper::map($menu,'id','naam');

$this->title = 'Bestelling';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bestelling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nieuwe Bestelling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'medewerker_id',
                'label'     => 'Naam Medewerker',
                'filter'    => $medewerkersList,
                'value'     => 'medewerkers.name'
            ],
            'naam',
            [
                'attribute' => 'menu_id',
                'label'     => 'Bestelling',
                'filter'    => $menuList,
                'value'     => 'menu.naam'
            ],
            [
                'attribute'=>'status',
                'filter'=>array('besteld'=>'is besteld', 'klaar'=>'is klaar', 'betaald'=>'is betaald'),
            ],
            //'timestamp',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bestelling $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
