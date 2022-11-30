<?php
//Abdullah Alibaks
//dd($medewerkers);
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//dd($menu);
$medewerkersList = ArrayHelper::map($medewerkers,'id','name');
$menuList = ArrayHelper::map($menu,'id','naam');
//dd($menuList);

/** @var yii\web\View $this */
/** @var app\models\Bestelling $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bestelling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'medewerker_id')->dropDownList($medewerkersList, ['prompt' => ''])->label('Medewerker') ?>

    <?= $form->field($model, 'naam')->textInput(['maxlength' => true])->label('Klantnaam') ?>

    <?= $form->field($model, 'menu_id')->dropDownList($menuList, ['prompt' => ''])->label('Bestelling') ?>
    <?= $form->field($model, 'status')->dropDownList([ 'besteld' => 'Besteld', 'klaar' => 'Klaar', 'geleverd' => 'Geleverd', '' => '', ], ['prompt' => ''])->label('Status bestelling') ?>

    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
