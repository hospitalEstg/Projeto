<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Consulta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

  <?php  foreach($model as $consulta){
            if($consulta->Estado ==0) {
          ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                           <th> Descricao </th>
                           <th> Urgente </th>
                            <th> Nome Utente </th>
                            <th> Editar </th>


                           </tr>
                           <tr>
                           <td>
                           <?= $consulta->Descricao; ?>
                           </td>
                            <td>
                             <?= $consulta->Estado; ?>
                            </td>



                             <td>
                                    <?= Html::a('Editar', ['update','idMarcacao_Consulta' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                    <?= Html::a('Consulta', ['consulta/create', 'idMarcacao_Consulta' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>

                                                       </td>

                           </tr>
                           </table>
                            <?php } }
                            ?>

    <?php /*echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idConsulta',
            'DataConsulta',
            'TipoConsulta',
            'Descricao',
            'Estado',
            //'idMedico',
            //'idFuncionario',
            //'hora',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>


</div>