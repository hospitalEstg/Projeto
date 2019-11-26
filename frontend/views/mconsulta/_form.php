<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarcacaoConsulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marcacao-consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idMarcacao_Consulta')->textInput() ?>

    <?= $form->field($model, 'Pessoa_idPessoa')->textInput() ?>

    <?= $form->field($model, 'Consulta_idConsulta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
