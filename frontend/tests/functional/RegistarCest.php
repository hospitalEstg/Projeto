<?php namespace frontend\tests\functional;
use frontend\tests\FunctionalTester;

class RegistarCest
{
    public function _before(FunctionalTester $I)
    {
    }

    // tests
    public function RegistarMedico(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Registar');

        $I->fillField('SignupForm[username]', 'Joao');
        $I->fillField('SignupForm[email]', 'joao@gmail.com');
        $I->fillField('SignupForm[password]', 'qweqwe');
        $I->fillField('SignupForm[DataNascimento]', '2000-01-10');
        $I->fillField('SignupForm[Morada]', 'Fátima');
        $I->fillField('SignupForm[NumUtenteSaude]', '123456789');
        $I->fillField('SignupForm[NumIDCivil]', '123456789');
        $I->fillField('SignupForm[TipoUtilizador]','Medico' );

        $I->click('Signup', 'button');
    }
    public function RegistarFuncionario(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Registar');

        $I->fillField('SignupForm[username]', 'Jose');
        $I->fillField('SignupForm[email]', 'jose@gmail.com');
        $I->fillField('SignupForm[password]', 'qweqwe');
        $I->fillField('SignupForm[DataNascimento]', '2000-01-10');
        $I->fillField('SignupForm[Morada]', 'Fátima');
        $I->fillField('SignupForm[NumUtenteSaude]', '123456789');
        $I->fillField('SignupForm[NumIDCivil]', '123456789');
        $I->fillField('SignupForm[TipoUtilizador]','Funcionario' );

        $I->click('Signup', 'button');
    }
    public function RegistarUtente(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Registar');

        $I->fillField('SignupForm[username]', 'Andre');
        $I->fillField('SignupForm[email]', 'andre@gmail.com');
        $I->fillField('SignupForm[password]', 'qweqwe');
        $I->fillField('SignupForm[DataNascimento]', '2000-01-10');
        $I->fillField('SignupForm[Morada]', 'Fátima');
        $I->fillField('SignupForm[NumUtenteSaude]', '123456789');
        $I->fillField('SignupForm[NumIDCivil]', '123456789');
        $I->fillField('SignupForm[TipoUtilizador]','Utente' );

        $I->click('Signup', 'button');
    }

    protected $formId = '#form-signup';

    public function CamposVazios(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Registar');

        $I->submitForm($this->formId, []);
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Email cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');
        $I->seeValidationError('Data Nascimento cannot be blank.');
        $I->seeValidationError('Morada cannot be blank.');
        $I->seeValidationError('Num Utente Saude cannot be blank.');
        $I->seeValidationError('Num Id Civil cannot be blank.');
        $I->seeValidationError('Tipo Utilizador cannot be blank.');

    }

    public function EmailErrado(FunctionalTester $I)
    {
        $I->amOnPage("/");
        $I->click('Registar');

        $I->submitForm(
            $this->formId, [
                'SignupForm[username]'  => 'Joao',
                'SignupForm[email]'     => 'joao',
                'SignupForm[password]'  => 'qweqwe',
                'SignupForm[DataNascimento]'=>'2000-01-10',
                'SignupForm[Morada]'=>'Fátima',
                'SignupForm[NumUtenteSaude]'=>'123456789',
                'SignupForm[NumIDCivil]'=>'123456789',
                'SignupForm[TipoUtilizador]'=>'Utente',
            ]
        );

        $I->see('Email is not a valid email address.', '.help-block');
    }

}
