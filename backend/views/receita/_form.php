<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Receita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DataReceita')
        ->label('Data da Consulta ')
        ->widget(
            DatePicker::className(), [
            'inline' => true,
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);?>

    <?= $form->field($model, 'Prescricao')->textInput(['maxlength' => true]) ?>

    <?php $consulta = \yii\helpers\ArrayHelper::map(\common\models\Consulta::find()->where('idMedico' == Yii::$app->user->identity->pessoa->idPessoa)->all(),'idConsulta','hora');

    echo $form->field($model, 'Consulta_idConsulta')->dropDownList($consulta) ->label('Consulta') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
