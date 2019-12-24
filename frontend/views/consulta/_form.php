<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Pessoa;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

 <div class="col-lg-4">
    <?= $form->field($model, 'DataConsulta')->widget(
        DatePicker::className(), [
        'inline' => true,
        'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>
    </div>

    <div class="col-lg-4">
       <?= $form->field($model, 'hora')->widget(
               DateTimePicker::className(), [
           'language' => 'en',
           'size' => 'ms',
           'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
           'pickButtonIcon' => 'glyphicon glyphicon-time',
           'inline' => true,
           'clientOptions' => [
               'startView' => 1,
               'minView' => 0,
               'maxView' => 1,
               'autoclose' => true,
               'linkFormat' => 'HH:ii P', // if inline = true
               // 'format' => 'HH:ii P', // if inline = false
               'todayBtn' => true
           ]
       ]);?>
       </div>


    <div class="col-lg-12">

        <?= $form->field($model, 'TipoConsulta')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true], ['style'=>'width:1000px']) ?>


       <?php $medico = ArrayHelper::map(Pessoa::find()->where(['TipoUtilizador' => 'Medico'])->all(),'idPessoa','Nome');
          echo $form->field($model, 'idMedico')->dropDownList($medico) ->label('Nome do Médico') ?>

          <?php $funcionario = ArrayHelper::map(Pessoa::find()->where(['TipoUtilizador' => 'Funcionario'])->all(),'idPessoa','Nome');
         echo $form->field($model, 'idFuncionario')->dropDownList($funcionario) ->label('Nome do Funcionário') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
