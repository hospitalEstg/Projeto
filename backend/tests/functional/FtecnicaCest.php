<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class FtecnicaCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function verftecnica(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Login');
        $I->fillField('LoginForm[username]', 'Joao');
        $I->fillField('LoginForm[password]', 'qweqwe');
        $I->click('Login', 'button');
        $I->click('#ftecnica');
    }

    public function criarftecnica(FunctionalTester $I)
    {


    }
}
