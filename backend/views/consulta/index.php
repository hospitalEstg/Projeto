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

  <?php  foreach($consulta as $value){

          ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                           <th> Descricao </th>
                           <th> Urgente </th>
                            <th> editar </th>


                           </tr>
                           <tr>
                           <td>
                           <?= $value->DataConsulta; ?>
                           </td>
                            <td>
                             <?= $value->Descricao; ?>
                            </td>


                             <td>
                                    <?= Html::a('Editar', ['update'], ['class' => 'btn btn-success']) ?>


                                                       </td>

                           </tr>
                           </table>
                            <?php }
                            ?>


</div>
