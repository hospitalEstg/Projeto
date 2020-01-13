<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Pessoas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pessoa-index">



        <?php foreach($pessoas as $pessoa) {
            if ($pessoa->TipoUtilizador == 'Utente') {
            ?>
                           <table class="table table-striped table-bordered">
                           <tr>
                           <th> Nome Utente </th>
                           <th> Data de Nascimento </th>
                           <th> Tipo de Utilizador </th>
                            <th> Opções </th>



                           </tr>
                           <tr>
                            <td>
                          <?= $pessoa->Nome; ?>
                                   </td>
                           <td>
                           <?= $pessoa->DataNascimento; ?>
                           </td>


                             <td>
                              <?= $pessoa->TipoUtilizador; ?>
                              </td>






                             <td>
                                 <?= Html::a('Update', ['update', 'id' => $pessoa->idPessoa], ['class' => 'btn btn-primary']) ?>
                                 <?= Html::a('Delete', ['delete', 'id' => $pessoa->idPessoa], [
                                     'class' => 'btn btn-danger',
                                     'data' => [
                                         'confirm' => 'Are you sure you want to delete this item?',
                                         'method' => 'post',
                                     ],
                                 ]) ?>



                                                       </td>

                           </tr>
                           </table>

            <?php } }?>




</div>
