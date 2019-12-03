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




    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idConsulta',
            'DataConsulta',
            'TipoConsulta',
            'Descricao',
            'Urgente',
            //'Estado',
            //'idMedico',
            //'idFuncionario',
            //'idUtente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
