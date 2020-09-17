<?php

use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use frontend\bundles\CalcAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \app\models\Credit */

$this->title = 'Credit calculator';

CalcAsset::register($this);
?>
<div>
    <?php $form = ActiveForm::begin([
        'id' => 'credit-form',
        'method' => 'POST',
        'action' => '/site/save-calculation'
    ]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::class, [
        'id' => 'period-start-input',
        'options' => ['placeholder' => 'Select credit start date'],
        'pluginOptions' => [
            'format' => 'dd-mm-yyyy',
            'todayHighlight' => true,
            'autoclose' => true
        ]
    ]) ?>

    <?= $form->field($model, 'value')->input('number', ['min' => 1, 'step' => 'any', 'id' => 'sum-input']) ?>

    <?= $form->field($model, 'month_count')->input('number', ['min' => 1, 'step' => 1, 'id' => 'month-sum-input'])->label('Credit period(months)') ?>

    <?= $form->field($model, 'percent')->input('number', ['min' => 1, 'max' => 99.99, 'step' => 'any', 'id' => 'percent-input']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save calculation', ['class' => 'btn btn-success', 'id' => 'save-calculation-button']) ?>
    </div>

    <?php ActiveForm::end() ?>

    <div id="graph-container"></div>

</div>
