<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MarcacaoConsulta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marcacao-consulta-form">

    <?php $form = ActiveForm::begin(['id' => 'marcacao-form']); ?>

    <?= $form->field($model, 'Pessoa_idPessoa')->hiddenInput(['value'=>Yii::$app->user->identity->pessoa->idPessoa])->label(false) ?>

    <?= $form->field($model, 'Consulta_idConsulta')->hiddenInput()?>

    <div class="col-lg-6" >

   <?= $form->field($model, 'Estado')->textInput() ?>

        <?= $form->field($model, 'Urgente')->textInput() ?>


    </div>
    <div class="col-lg-6" >
        <?= $form->field($model, 'Descricao')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
