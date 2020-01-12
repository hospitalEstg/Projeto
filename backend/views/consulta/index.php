<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-index">

    <?php

    if (Yii::$app->user->isGuest) {
        echo <<<HTML
         <h1>Não logado</h1>
HTML;

    } else {
            if (Yii::$app->user->identity->pessoa->TipoUtilizador == 'Utente'){
                echo <<<HTML
             <h1>Não está autorizado</h1>
HTML;
            }
            if (Yii::$app->user->identity->pessoa->TipoUtilizador == 'Medico'){
                $utilizador = Yii::$app->user->identity->pessoa->Nome;
                ?>

                <div>
                    <?php
                    foreach ($model as $consulta) {

                        if ($consulta->Estado == 0 && $consulta->idMedico == Yii::$app->user->identity->pessoa->idPessoa) {
                            ?>

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th> Descrição do Utente</th>
                                    <th> Informação</th>
                                    <th> Estado da Consulta</th>
                                    <th> Tipo de Consulta</th>
                                    <th> Urgente</th>
                                    <th> Editar</th>


                                </tr>
                                <tr>
                                    <td>
                                        <?= $consulta->marcacao->Descricao; ?>
                                    </td>
                                    <td>
                                        <?= $consulta->Descricao; ?>
                                    </td>

                                    <td>
                                        <?php if ($consulta->Estado == 0) {
                                            echo "Consulta Não Realizada";
                                        } else echo "Consulta Realizada"; ?>

                                    </td>
                                    <td>
                                        <?= $consulta->TipoConsulta; ?>
                                    </td>

                                    <td>
                                        <?= $consulta->marcacao->Urgente; ?>
                                    </td>


                                    <td>
                                        <?= Html::a('Detalhes', ['view', 'id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Editar', ['update', 'id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Delete', ['delete', 'id' => $consulta->idConsulta], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                        <?php   if($consulta->Estado==0)  ?>

                                        <?= Html::a(' Realizar Consulta', ['consulta','id' => $consulta->idConsulta], ['class' => 'btn btn-success'])

                                        ?>
                                    </td>

                                </tr>
                            </table>

                            <?php

                        }
                    }
                    ?>
                </div>
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-6" >
                </div>
                <div class="col-lg-6" >

                    <br>
                    <?= Html::a('Criar Consulta', ['consulta/create', 'idMarcacao_Consulta' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                </div>
                <?php
            }
            if (Yii::$app->user->identity->pessoa->TipoUtilizador == 'Funcionario'){
            $utilizador = Yii::$app->user->identity->pessoa->Nome;
                ?>
                <div>
                    <?php
                    foreach ($model as $consulta) {

                        if ($consulta->Estado == 0) {
                            ?>

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th> Descrição do Utente</th>
                                    <th> Informação</th>
                                    <th> Estado da Consulta</th>
                                    <th> Tipo de Consulta</th>
                                    <th> Urgente</th>
                                    <th> Editar</th>


                                </tr>
                                <tr>
                                    <td>
                                        <?= $consulta->marcacao->Descricao; ?>
                                    </td>
                                    <td>
                                        <?= $consulta->Descricao; ?>
                                    </td>

                                    <td>
                                        <?php if ($consulta->Estado == 0) {
                                            echo "Consulta Não Realizada";
                                        } else echo "Consulta Realizada"; ?>

                                    </td>
                                    <td>
                                        <?= $consulta->TipoConsulta; ?>
                                    </td>

                                    <td>
                                        <?= $consulta->marcacao->Urgente; ?>
                                    </td>


                                    <td>
                                        <?= Html::a('Ver', ['view', 'id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Editar', ['update', 'id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                        <?= Html::a('Delete', ['delete', 'id' => $consulta->idConsulta], [
                                            'class' => 'btn btn-danger',
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ],
                                        ]) ?>
                                    </td>

                                </tr>
                            </table>

                            <?php

                        }
                    }
                    ?>
                </div>
                <div class="col-lg-12"><hr></div>
                <div class="col-lg-6" >
                </div>
                <div class="col-lg-6" >

                    <br>
                    <?= Html::a('Criar Consulta', ['consulta/create', 'idMarcacao_Consulta' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                </div>
                <?php
            }
        }
    ?>
</div>

