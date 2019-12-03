<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marcacao Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacao-consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Pedido de Consulta ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


            <h1> Consultas Pendentes </h1>
          <?php  foreach($marcacao as $value){
            if($value->Estado ==1) {
          ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                           <th> Descricao </th>
                           <th> Urgente </th>
                            <th> editar </th>


                           </tr>
                           <tr>
                           <td>
                           <?= $value->Descricao; ?>
                           </td>
                            <td>
                             <?= $value->Urgente; ?>
                            </td>
                             <td>
                                    <?= Html::a('Editar', ['update','idMarcacao_Consulta' => $value->idMarcacao_Consulta, 'Pessoa_idPessoa' =>$value->Pessoa_idPessoa ], ['class' => 'btn btn-success']) ?>

                                                       </td>

                           </tr>
                           </table>
                            <?php } }
                            ?>


    <?php /*echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'Estado',
            'Descricao',
            'Urgente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);*/ ?>


</div>
