<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pessoa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPessoa')->textInput() ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Idade')->textInput() ?>

    <?= $form->field($model, 'DataNascimento')->textInput() ?>

    <?= $form->field($model, 'Morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumUtenteSaude')->textInput() ?>

    <?= $form->field($model, 'NumIDCivil')->textInput() ?>

    <?= $form->field($model, 'CedulaProfissional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TipoUtilizador')->dropDownList([ 'Medico' => 'Medico', 'Utente' => 'Utente', 'Funcionario' => 'Funcionario', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
