<?php

use yii\db\Migration;

/**
 * Class m191029_101340_init_rbac_author
 */
class m191029_101340_init_rbac_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $auth= yii::$app->authManager;
    // 1- criar permissoes
        $verConsultas = $auth->createPermission('verConsultas');
        $verConsultas->description = 'Ver uma consulta';
        $auth->add($verConsultas);

        $criarConsultas = $auth->createPermission('criarConsultas');
        $criarConsultas->description = 'Criar uma consulta';
        $auth->add($criarConsultas);

        $alterarConsultas = $auth->createPermission('alterarConsultas');
        $alterarConsultas->description = 'alterar uma consulta';
        $auth->add($alterarConsultas);

        $apagarConsultas = $auth->createPermission('apagarConsultas');
        $apagarConsultas->description = 'Apagar uma consulta';
        $auth->add($apagarConsultas);

        $verMarcacaoConsultas = $auth->createPermission('verMarcacaoConsultas');
        $verMarcacaoConsultas->description = 'Ver uma marcação de consulta';
        $auth->add($verMarcacaoConsultas);

        $criarMarcacaoConsultas = $auth->createPermission('criarMarcacaoConsultas');
        $criarMarcacaoConsultas->description = "Criar uma marcação de consulta";
        $auth->add($criarMarcacaoConsultas);

        $alterarMarcacaoConsultas = $auth->createPermission('alterarMarcacaoConsultas');
        $alterarMarcacaoConsultas->description = "Alterar uma marcação de consulta";
        $auth->add($alterarMarcacaoConsultas);

        $apagarMarcacaoConsultas = $auth->createPermission('apagarMarcacaoConsultas');
        $apagarMarcacaoConsultas->description = 'Apagar uma marcação de consulta';
        $auth->add($apagarMarcacaoConsultas);

        $verMedicamento = $auth->createPermission('verMedicamento');
        $verMedicamento->description = 'Ver um Medicamento';
        $auth->add($verMedicamento);

        $criarMedicamento = $auth->createPermission('criarMedicamento');
        $criarMedicamento->description = 'Criar um medicamento';
        $auth->add($criarMedicamento);

        $verReceita = $auth->createPermission('verReceita');
        $verReceita->description = 'Ver uma Receita';
        $auth->add($verReceita);

        $criarReceita = $auth->createPermission('criarReceita');
        $criarReceita->description = 'Criar uma receita';
        $auth->add($criarReceita);

        $verFichatecnica = $auth->createPermission('verFichatecnica');
        $verFichatecnica->description = 'Ver uma Ficha Tecnica';
        $auth->add($verFichatecnica);

        $criarFichatecnica = $auth->createPermission('criarFichatecnica');
        $criarFichatecnica->description = 'Criar uma ficha tecnica';
        $auth->add($criarFichatecnica);

        $alterarFichatecnica = $auth->createPermission('alterarFichatecnica');
        $alterarFichatecnica->description = 'Alterar uma ficha tecnica';
        $auth->add($alterarFichatecnica);

        $apagarFichatecnica = $auth->createPermission('apagarFichatecnica');
        $apagarFichatecnica->description = 'apagarr uma ficha tecnica';
        $auth->add($apagarFichatecnica);



    // 2- criar roles (ou perfis)


    // add "author" role and give this role the "createPost" permission
        $guest = $auth->createRole('guest');
        $auth->add($guest);


        $utente = $auth->createRole('Utente');
        $auth->add($utente);
        $auth->addChild($utente, $criarMarcacaoConsultas);
        $auth->addChild($utente, $verConsultas);
        $auth->addChild($utente, $verReceita);
        $auth->addChild($utente, $verFichatecnica);
        $auth->addChild($utente, $verMarcacaoConsultas);
        $auth->addChild($utente, $verMedicamento);

       // $auth->addChild($utente, $alterarMarcacaoConsultas);

 // add "admin" role and give this role the "createPost" permission
        $funcionario = $auth->createRole('Funcionario');
        $auth->add($funcionario);
        $auth->addChild($funcionario, $criarConsultas);
        $auth->addChild($funcionario, $alterarConsultas);
        $auth->addChild($funcionario, $apagarConsultas);
        $auth->addChild($funcionario, $apagarMarcacaoConsultas);
        $auth->addChild($funcionario, $verConsultas);
        $auth->addChild($funcionario, $verReceita);
        $auth->addChild($funcionario, $verFichatecnica);
        $auth->addChild($funcionario, $verMarcacaoConsultas);
        $auth->addChild($funcionario, $verMedicamento);


        $medico = $auth->createRole('Medico');
        $auth->add($medico);
        $auth->addChild($medico, $criarFichatecnica );
        $auth->addChild($medico, $alterarFichatecnica );
        $auth->addChild($medico, $criarReceita );
        $auth->addChild($medico, $verConsultas);
        $auth->addChild($medico, $verReceita);
        $auth->addChild($medico, $verFichatecnica);
        $auth->addChild($medico, $verMarcacaoConsultas);
        $auth->addChild($medico, $verMedicamento);




    // 3- associar utilizadores a roles
    // Assign roles to users.2 are IDs returned by IdentityInterface::getId()

     /*   $auth->assign($guest, 4);
        $auth->assign($utente, 1);
        $auth->assign($secretaria, 2);
        $auth->assign($medico, 3);
*/
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    $auth= yii::$app->authManager;
    $auth->removeAll();
        echo "m191029_101340_init_rbac_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191029_101340_init_rbac_author cannot be reverted.\n";

        return false;
    }
    */
}
