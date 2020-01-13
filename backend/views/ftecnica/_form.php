<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FichaTecnica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ficha-tecnica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Ficheiro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observacoes')->textInput(['maxlength' => true]) ?>

    <?php $consulta = \yii\helpers\ArrayHelper::map(\common\models\Consulta::find()->where('idMedico' == Yii::$app->user->identity->pessoa->idPessoa)->all(),'idConsulta','hora');

    echo $form->field($model, 'Consulta_idConsulta')->dropDownList($consulta) ->label('Consulta') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
