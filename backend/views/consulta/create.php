<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */

$this->title = 'Create Consulta';
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consulta-create">


    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
