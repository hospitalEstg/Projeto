<?php

/* @var $this yii\web\View */

$this->title = 'Hospital ESTG';
?>
<div class="site-index">

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

            echo <<<HTML
          <div class="body-content">
          <h3><b>Médico :</b> $utilizador</h3>
                    <div class="row consulta-layout">
                        <a href="/consulta/index">
                        <div class="col-lg-4 consulta-layout-3">
                            <img src="/img/icone_consulta.png" alt="as" height="100px">
                            <h1><b>Consultas</b></h1>
                        </div>
                        </a>
                    
                        <a href="/ftecnica/index" id="ftecnica">
                        <div class="col-lg-4 consulta-layout-1">
                            <img src="/img/icone_ficha.png" alt="as" height="100px">
                            <h1><b>Ficha Clinica</b></h1>
                        </div>
                        </a>
                        
                         <a href="/receita/index">
                        <div class="col-lg-4 consulta-layout-3">
                            <img src="/img/icone_medico.png" alt="as" height="100px">
                            <h1><b>Receitas</b></h1>
                        </div>
                        </a>
                    </div>           
                </div>
HTML;
        }
        if (Yii::$app->user->identity->pessoa->TipoUtilizador == 'Funcionario'){
            $utilizador = Yii::$app->user->identity->pessoa->Nome;

            echo <<<HTML
                   <div class="body-content">
          <h3><b>Funcionário :</b> $utilizador</h3>
                    <div class="row consulta-layout">
                        <a href="/pessoa/index">
                        <div class="col-lg-4 consulta-layout-1">
                            <img src="/img/icone_ficha.png" alt="as" height="100px">
                            <h1><b>Utentes</b></h1>
                        </div>
                        </a>
                        <a href="/marcacao/index">
                        <div class="col-lg-4 consulta-layout-3">
                            <img src="/img/icone_consulta.png" alt="as" height="100px">
                            <h1><b>Marcações</b></h1>
                        </div>
                        </a>
                        <a href="/consulta/index">
                        <div class="col-lg-4 consulta-layout-3">
                            <img src="/img/icone_consulta.png" alt="as" height="100px">
                            <h1><b>Consultas</b></h1>
                        </div>
                        </a>
                       
                    
                    </div>           
                </div>
HTML;
        }




    }
    ?>
</div>
