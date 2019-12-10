<?php

/* @var $this yii\web\View */

$this->title = 'Hospital ESTG';
?>
<div class="site-index">

    <?php
    if (Yii::$app->user->isGuest) {
        echo <<<HTML
        <div class="jumbotron">
                    <h1>Bem Vindo,</h1>
                </div>
            
                <div class="body-content">
            

                    
                </div>
HTML;

        
    } else {
        echo <<<HTML
        
                <div class="body-content">
                    <div class="row consulta-layout">
                        <a href="consulta/index">
                        <div class="col-lg-4 consulta-layout-1">
                            <img src="/img/icone_consulta.png" alt="as" height="100px">
                            <h1><b>Consultas</b></h1>
                        </div>
                        </a>
                        
                        <a href="ftecnica/index">
                        <div class="col-lg-4 consulta-layout-2">
                            <img src="/img/icone_ficha.png" alt="as" height="100px">
                            <h1><b>Fichas Técnicas</b></h1>
                        </div>
                        </a>
                        
                        <a href="receita/index">
                        <div class="col-lg-4 consulta-layout-3">
                            <img src="/img/icone_medico.png" alt="as" height="100px">
                            <h1><b>Receitas Médicas</b></h1>
                        </div>
                        </a>
                    </div>           
                </div>
HTML;

    }
    ?>
</div>
