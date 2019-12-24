<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Consulta */
/* @var $ftec common\models\FichaTecnica */


$this->title = $model->idConsulta;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div>
<?php echo "Nome Utente: ". $model->marcacao->pessoa->Nome; ?>

<

<div >

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($ftec, 'Ficheiro')->textInput() ?>

    <?= $form->field($ftec, 'Observacoes')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>




</div>
<div>


</div>

