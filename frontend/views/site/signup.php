<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nome') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'DataNascimento')->widget(
                    DatePicker::className(), [
                    // inline too, not bad
                    'inline' => true,
                    // modify template for custom rendering
                    'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]);?>

                <?= $form->field($model, 'Morada')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'NumUtenteSaude')->textInput() ->label('Número de Utente') ?>

                <?= $form->field($model, 'NumIDCivil')->textInput() ->label('Número de Identificação Civil') ?>

                <?= $form->field($model, 'TipoUtilizador')->dropDownList(['Utente' => 'Utente', 'Medico' => 'Medico', 'Funcionario' => 'Funcionario', ]) ?>


            <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>






















