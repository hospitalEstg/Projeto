<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */

$this->title = $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div>
<?php foreach($consultas as $value){
echo $value->Descricao;
} ?>

</div>

