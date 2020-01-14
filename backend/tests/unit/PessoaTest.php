<?php namespace backend\tests;

use common\models\Pessoa;

class PessoaTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $pessoa = new Pessoa();


        $pessoa->idUser = '1';
        $pessoa->Nome = "Joao";
        $pessoa->DataNascimento = "2020-01-10";
        $pessoa->Morada = "Fatima";
        $pessoa->NumUtenteSaude = "123456789";
        $pessoa->NumIDCivil = "123456789";
        $pessoa->TipoUtilizador = "Medico";


        $pessoa->save();
    }

    protected function _after()
    {
    }

    public function getPessoaValida()
    {
        $pessoa = new Pessoa();

        $pessoa->idUser = '2';
        $pessoa->Nome = "Joao";
        $pessoa->DataNascimento = "2020-01-10";
        $pessoa->Morada = "Fatima";
        $pessoa->NumUtenteSaude = "123456789";
        $pessoa->NumIDCivil = "123456789";
        $pessoa->TipoUtilizador = "Medico";


        $pessoa->save();
    }

    public function testPessoaValida()
    {
        $pessoa = new Pessoa();

        $this->assertFalse($pessoa->validate());
    }

    public function testidUserVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->idUser = '';

        $this->assertFalse($pessoa->validate());
    }

    public function testNomeVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->Nome = "";

        $this->assertFalse($pessoa->validate());
    }

    public function testDataNascimentoVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->DataNascimento = "";

        $this->assertFalse($pessoa->validate());
    }

    public function testMoradaVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->Morada = "";

        $this->assertFalse($pessoa->validate());
    }

    public function testNumUtenteSaudeVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->NumUtenteSaude = "";

        $this->assertFalse($pessoa->validate());
    }

    public function testNumIDCivilVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->NumIDCivil = "";

        $this->assertFalse($pessoa->validate());
    }

    public function testTipoUtilizadorVazio()
    {
        $pessoa = new Pessoa();

        $pessoa->TipoUtilizador = "";

        $this->assertFalse($pessoa->validate());
    }

    public function testAtualizarRegisto()
    {
        $this->tester->haveRecord(Pessoa::class, ['idUser' => '2', 'Nome' => 'Joao', 'DataNascimento' => '2020-01-10', 'Morada' => 'Fatima', 'NumUtenteSaude' => '123456789', 'NumIDCivil' => '123456789', 'TipoUtilizador' => 'Medico']);
        $u = Pessoa::findOne(['Nome' => 'Joao']);
        $u->Nome= "Jose";
        $u->save();
    }

    public function testRemoverRegisto()
    {
        $u = Pessoa::findOne(['Nome' => 'Jose']);
        $u->delete();
       $this->tester->cantSeeRecord(Pessoa::class, ['idUser' => '1', 'Nome' => 'Jose', 'DataNascimento' => '2020-01-10', 'Morada' => 'Fatima', 'NumUtenteSaude' => '123456789', 'NumIDCivil' => '123456789', 'TipoUtilizador' => 'Medico']);
    }

}