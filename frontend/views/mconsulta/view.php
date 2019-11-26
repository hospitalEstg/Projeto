<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MarcacaoConsulta */

$this->title = $model->idMarcacao_Consulta;
$this->params['breadcrumbs'][] = ['label' => 'Marcacao Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="marcacao-consulta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa, 'Utente_Consulta_idConsulta' => $model->Utente_Consulta_idConsulta, 'Pessoa_idUtente' => $model->Pessoa_idUtente, 'Funcionario_Consulta_idConsulta' => $model->Funcionario_Consulta_idConsulta, 'Pessoa_idMedico' => $model->Pessoa_idMedico, 'Medico_Consulta_idConsulta' => $model->Medico_Consulta_idConsulta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idMarcacao_Consulta' => $model->idMarcacao_Consulta, 'Pessoa_idPessoa' => $model->Pessoa_idPessoa, 'Utente_Consulta_idConsulta' => $model->Utente_Consulta_idConsulta, 'Pessoa_idUtente' => $model->Pessoa_idUtente, 'Funcionario_Consulta_idConsulta' => $model->Funcionario_Consulta_idConsulta, 'Pessoa_idMedico' => $model->Pessoa_idMedico, 'Medico_Consulta_idConsulta' => $model->Medico_Consulta_idConsulta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idMarcacao_Consulta',
            'Pessoa_idPessoa',
            'Utente_Consulta_idConsulta',
            'Pessoa_idUtente',
            'Funcionario_Consulta_idConsulta',
            'Pessoa_idMedico',
            'Medico_Consulta_idConsulta',
            'Consulta_idConsulta',
        ],
    ]) ?>

</div>
