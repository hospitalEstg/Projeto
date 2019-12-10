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
             <div class="jumbotron">
                    <h1>(Teste) está logado</h1>
                </div>
            
                <div class="body-content">
            
                    <div class="row">
                        <div class="col-lg-4">
            
            
                            <p><a class="botao" href="http://frontend.local/consulta/index">Yii</a></p>
                        </div>
                        <div class="col-lg-4">
            
            
                            <p><a class="botao" href="http://www.yiiframework.com/forum/">Yii</a></p>
                        </div>
                        <div class="col-lg-4">
            
            
                            <p><a class="botao" href="http://www.yiiframework.com/extensions/">Yii </a></p>
                        </div>
                    </div>
            
                </div>
HTML;

    }
    ?>
</div>
