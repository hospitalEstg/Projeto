<?php namespace frontend\tests;

class MarcacaoTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\FunctionalTester
     */
    protected $tester;
    
    protected function _before(FunctionalTester $I)
     {
     }

     protected function _after(FunctionalTester $I)
     {
     }

    // tests
    public function TryToLogin(FunctionalTester $I)
    {
             //   $I->amOnPage(\Yii::$app->homeUrl);
               $I->amOnPage("/");
               $I->click('Login');
               $I->fillField('LoginForm[username]', 'micaela');
               $I->fillField('LoginForm[password]', 'micaela');
               $I->click('Login', 'button');
               $I->see('Logout (Micaela)');
    }
}