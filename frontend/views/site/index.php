<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php
    if (Yii::$app->user->isGuest) {
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
