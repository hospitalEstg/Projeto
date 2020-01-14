<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $ftec common\models\FichaTecnica */
/* @var $rec common\models\Receita */
/* @var $med common\models\Medicamento */


$this->title = $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div>

<?php echo "<h3><b>Nome Utente:</b> ". $model->marcacao->pessoa->Nome . '</h3>'; ?>

    <hr>

<div class="col-lg-6 ">
    <h2><b>Ficha Clinica</b></h2>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($ftec, 'Ficheiro')->textInput() ?>

    <?= $form->field($ftec, 'Observacoes')->textInput()->label('Observações') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




</div>
<div class="col-lg-6 ">
    <h2><b>Receita médica</b></h2>
    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($rec, 'Prescricao')->textInput(['maxlength' => true])->label('Prescrição') ?>

    <?= $form->field($med, 'Nome')->textInput(['maxlength' => true])->label('Nome Medicamento') ?>

    <?= $form->field($rec, 'DataReceita')
        ->label('Data da Receita ')
        ->widget(
            DatePicker::className(), [
            'inline' => true,
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
