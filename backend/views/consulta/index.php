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
                foreach ($model_1 as $marcacao) {
                    foreach ($model as $consulta) {

                        if ($consulta->Estado == 0 && $consulta->idMedico == Yii::$app->user->identity->pessoa->idPessoa && $marcacao->Consulta_idConsulta == $consulta->idConsulta ) {
                            ?>

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th style="width: 120px;"> Tipo Consulta</th>
                                    <th style="width: 250px;"> Informação</th>
                                    <th style="width: 100px;"> Estado da Consulta</th>

                                    <th style="width: 100px;"> Urgente</th>
                                    <th style="width: 00px;"></th>


                                </tr>
                                <tr>
                                    <td>
                                        <?= $consulta->TipoConsulta; ?>
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
                                        <?php if ($marcacao->Urgente == 0) {
                                            echo "Não";
                                        } else echo "Sim"; ?>
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
                                        <?php if ($consulta->Estado == 0) ?>

                                        <?= Html::a(' Realizar Consulta', ['consulta', 'id' => $consulta->idConsulta], ['class' => 'btn btn-primary'])

                                        ?>
                                    </td>

                                </tr>
                            </table>

                            <?php
                        }
                        }
                    }
                    ?>
                </div>
                <?php
            }
            if (Yii::$app->user->identity->pessoa->TipoUtilizador == 'Funcionario'){
            $utilizador = Yii::$app->user->identity->pessoa->Nome;
                ?>
                <div>
                    <?php
                foreach ($model_1 as $marcacao) {
                    foreach ($model as $consulta) {
                        if ($marcacao->Consulta_idConsulta == $consulta->idConsulta ) {
                            ?>

                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th style="width: 120px;"> Tipo Consulta</th>
                                    <th style="width: 250px;"> Descrição do Utente</th>
                                    <th style="width: 250px;"> Informação</th>
                                    <th style="width: 100px;"> Estado da Consulta</th>

                                    <th style="width: 100px;"> Urgente</th>
                                    <th style="width: 00px;"></th>


                                </tr>
                                <tr>
                                    <td>
                                        <?= $consulta->TipoConsulta; ?>
                                    </td>
                                    <td>
                                        <?= $marcacao->Descricao; ?>
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
                                        <?php if ($marcacao->Urgente == 0) {
                                            echo "Não";
                                        } else echo "Sim"; ?>
                                    </td>


                                    <td>
                                        <?= Html::a('Detalhes', ['view', 'id' => $consulta->idConsulta], ['class' => 'btn btn-success']) ?>
                                    </td>

                                </tr>
                            </table>

                            <?php

                        }
                    }
                }
                    ?>
                </div>
                <?php
            }
        }
    ?>
</div>

