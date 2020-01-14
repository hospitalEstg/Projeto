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
            $I->click('Marcar Consulta');
            $I->fillField('Estado', '0');
            $I->fillField('Urgente', '1');
            $I->fillField('Descricao', 'teste funcional 2');
            $I->click('Save', 'button');




    }
}
