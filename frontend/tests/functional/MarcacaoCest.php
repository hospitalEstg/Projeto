<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class MarcacaoCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {


            $I->amOnPage('site/login');
            $I->click('Login');
            $I->fillField('LoginForm[username]', 'rafa');
            $I->fillField('LoginForm[password]', 'micaela');
            $I->click('Login', 'button');
            $I->see('Consultas');
            $I->click('Consultas');
            $I->see('Próximas Consultas');

            $I->see('Marcar Consulta');
                        //$I->click('Marcar Consulta');
          //$I->click('Marcar Consulta', 'a');
    }
}
