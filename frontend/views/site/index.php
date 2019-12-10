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
                    <div class="row">
                        <div class="col-lg-4">
                            <p><a class="botao" href="consulta/index">Consultas</a></p>
                        </div>
                        <div class="col-lg-4">
                            <p><a class="botao" href="ftecnica/index">Fichas Técnicas</a></p>
                        </div>
                        <div class="col-lg-4">
                            <p><a class="botao" href="receita/index">Receitas Médicas </a></p>
                        </div>
                    </div>           
                </div>
HTML;

    }
    ?>
</div>
