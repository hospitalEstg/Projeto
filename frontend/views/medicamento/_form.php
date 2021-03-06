<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Medicamento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="medicamento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idMedicamento')->textInput() ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
