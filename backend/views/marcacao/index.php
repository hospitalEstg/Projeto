<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-consulta-index">
            <h1> Consultas Pendentes </h1>
          <?php  foreach($marcacao as $value){
            if($value->Estado ==0) {
          ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                               <th> Nome Utente </th>
                               <th> Descricao </th>
                               <th> Urgente </th>
                               <th> Editar </th>


                           </tr>
                           <tr>
                               <td style="width: 150px;">
                                   <?= $value->pessoa->Nome; ?>
                               </td>
                           <td>
                           <?= $value->Descricao; ?>
                           </td>
                            <td style="width: 100px;">
                             <?php if ($value->Urgente == 0) {
                                 echo "Não";
                             } else echo "Sim"; ?>
                            </td>


                             <td style="width: 400px;">
                                 <?= Html::a('Ver', ['view','idMarcacao_Consulta' => $value->idMarcacao_Consulta, 'Pessoa_idPessoa' =>$value->Pessoa_idPessoa ], ['class' => 'btn btn-success']) ?>

                                    <?= Html::a('Editar', ['update','idMarcacao_Consulta' => $value->idMarcacao_Consulta, 'Pessoa_idPessoa' =>$value->Pessoa_idPessoa ], ['class' => 'btn btn-success']) ?>

                                    <?= Html::a('Adicionar a consulta', ['consulta/create', 'idMarcacao_Consulta' => $value->idMarcacao_Consulta], ['class' => 'btn btn-primary']) ?>

                                 <?= Html::a('Delete', ['delete', 'idMarcacao_Consulta' => $value->idMarcacao_Consulta, 'Pessoa_idPessoa' => $value->Pessoa_idPessoa], [
                                     'class' => 'btn btn-danger',
                                     'data' => [
                                         'confirm' => 'Are you sure you want to delete this item?',
                                         'method' => 'post',
                                     ],
                                 ]) ?>
                                                       </td>

                           </tr>
                           </table>
                            <?php } }
                            ?>

    <?php /* echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idMarcacao_Consulta',
            'Pessoa_idPessoa',
            'Consulta_idConsulta',
            'Estado',
            'Descricao',
            //'Urgente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?>


</div>
