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
            $I->fillField('LoginForm[username]', 'micaelaa');
            $I->fillField('LoginForm[password]', 'micaela');
            $I->click('Login', 'button');
            $I->see('Marcações');

            $I->click('Marcações');
            $I->see('xzxzxz');
            $I->click('Adicionar a consulta', ['Descricao'=> 'xzxzxz']);

           }
}
