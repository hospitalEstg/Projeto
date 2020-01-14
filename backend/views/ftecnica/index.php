<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ficha Tecnicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ficha-tecnica-index">


   <?php
            foreach ($model_3 as $pessoa){
                foreach ($model_2 as $consulta){
                    foreach ($model_1 as $marcacao){
                        foreach ($model as $ficha){
                            if($consulta->idMedico == Yii::$app->user->identity->pessoa->idPessoa && $marcacao->Consulta_idConsulta != null && $consulta->idConsulta==$marcacao->Consulta_idConsulta && $consulta->idMedico==$pessoa->idPessoa && $ficha->Consulta_idConsulta==$consulta->idConsulta) {?>

                                <br>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Médico: <?= $pessoa->Nome ?></th>
                                        <td style="width: 350px;"><b>Data:</b> <?= $consulta->DataConsulta ?> || <b>Hora:</b> <?= $consulta->hora; ?></td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td><b>Prescrição:</b> <?= $ficha->Observacoes; ?></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><?= Html::a('Ver detalhes', ['view', 'id' => $ficha->idFichaClinica], ['class' => 'btn btn-primary']) ?>
                                        </td>
                                    </tr>
                                </table>
                                <br>
        <?php } } } } } ?>


</div>
