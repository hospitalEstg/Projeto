<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;

class ConsultCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
                $I->see('Login');

                $I->seeLink('Login');
                $I->click('Login');
                $I->wait(2);
               // $I->             // wait for page to be opened

              //  $I->see('This is the About page.');
    }
}
