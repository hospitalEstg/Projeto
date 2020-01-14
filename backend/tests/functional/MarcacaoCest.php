<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;
use \Codeception\Util\Locator;


class MarcacaoCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    public function testSomeFeature(FunctionalTester $I)
           {

             /*  $I->amOnPage('/site/login');
               $I->fillField('LoginForm[username]', 'funcionarioo');
                $I->fillField('LoginForm[password]', 'micaela');
               $I->click('login', 'button');
               //$I->click('Utentes');

        */


            $I->amOnPage('site/login');
            $I->click('Login');
            $I->fillField('LoginForm[username]', 'funcionario');
            $I->fillField('LoginForm[password]', 'micaela');
            $I->click('Login', 'button');
            $I->see('Marcações');

            $I->click('Marcações');
          //  $I->reloadPage();
            //$I->click('Marcar Consulta');
           // $I->seeElement(Locator::find('td', ['descricao' => 'xzxzxz']));
          // $I->see('micaela');
          //$I->seeElement('Adicionar a consulta', ['descricao'=>'xzxzxz']);
          //$I->see('xzxzxz');



           }
}
