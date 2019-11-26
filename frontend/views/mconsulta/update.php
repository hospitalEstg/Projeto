<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarcacaoConsulta */

$this->title = 'Update Marcacao Consulta: ' . $model->idMarcacao_Consulta;
$this->params['breadcrumbs'][] = ['label' => 'Marcacao Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMarcacao_Consulta, 'url' => ['view', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa, 'Utente_Consulta_idConsulta' => $model->Utente_Consulta_idConsulta, 'Pessoa_idUtente' => $model->Pessoa_idUtente, 'Funcionario_Consulta_idConsulta' => $model->Funcionario_Consulta_idConsulta, 'Pessoa_idMedico' => $model->Pessoa_idMedico, 'Medico_Consulta_idConsulta' => $model->Medico_Consulta_idConsulta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcacao-consulta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
