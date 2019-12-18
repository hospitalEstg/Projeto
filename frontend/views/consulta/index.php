<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Consultas';
?>
<div class="consulta-index">

    <div class="row consulta-layout">

        <div class="col-lg-6">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'DataConsulta',
                    'hora',
                    'TipoConsulta',
                    'Descricao',
                    'Estado',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>

        <div class="col-lg-6">
            <p>
                <?= Html::a('Create Consulta', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>





</div>