<?php namespace backend\tests;

class FtecnicaCest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\FunctionalTester
     */
    protected $tester;


    public function testEntraFtecnica(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Login');
        $I->fillField('LoginForm[username]', 'Joao');
        $I->fillField('LoginForm[password]', 'qweqwe');
        $I->click('Login', 'button');
        $I->click('#ftecnica');

    }
}