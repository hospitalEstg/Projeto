<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Receitas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receita-index">

    <h1><?= Html::encode($this->title) ?></h1>




    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'DataReceita',
            'Prescricao',
            // Por data da consulta ou aceder a consulta q ocorreu

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
