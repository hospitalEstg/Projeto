<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Pessoa;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consulta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DataConsulta')->textInput() ?>

    <?= $form->field($model, 'TipoConsulta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput() ?>

        <?= $form->field($model, 'hora')->textInput() ?>


  <?php $funcionario = ArrayHelper::map(Pessoa::find()->where(['TipoUtilizador' => 'Funcionario'])->all(),'idPessoa','Nome');
   echo $form->field($model, 'idFuncionario')->dropDownList($funcionario) ?>


<?php $medico = ArrayHelper::map(Pessoa::find()->where(['TipoUtilizador' => 'Medico'])->all(),'idPessoa','Nome');
   echo $form->field($model, 'idMedico')->dropDownList($medico) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
