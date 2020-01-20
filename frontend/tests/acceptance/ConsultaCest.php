<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;

class ConsultaCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/');
       //$I->see('My Application');

        $I->seeLink('Login');
        $I->click('Login');
        $I->wait(2); // wait for page to be opened
       // wait for page to be opened
         $I->amGoingTo('try to login with correct credentials');
      $I->fillField('input[name="LoginForm[username]"]', 'micaelaa');
      $I->fillField('input[name="LoginForm[password]"]', 'micaela');
        $I->click('login-button');
          $I->wait(2);
          $I->click('Consultas');
          $I->wait(4);
          $I->click('Marcar Consulta');
           $I->fillField('Estado', '0');
          $I->fillField('Urgente', '1');
           $I->fillField('Descricao', 'Teste aceitacao');
           $I->wait(1);
         $I->click('Save');
         $I->wait(3);
          $I->amOnPage('/');
          $I->wait(2);
          $I->click('Consultas');
          $I->wait(4);



       // $I->see('This is the About page.');
    }

}
