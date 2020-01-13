<?php namespace backend\tests;

use common\models\FichaTecnica;

class FtecnicaTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $fichatecnica = new FichaTecnica();

        $fichatecnica->Ficheiro = "teste";
        $fichatecnica->Observacoes = "teste";
        $fichatecnica->Consulta_idConsulta= "1";

        $fichatecnica->save();
    }

    protected function _after()
    {
    }

    public function getFtecnicaValida()
    {
        $fichatecnica = new FichaTecnica();

        $fichatecnica->Ficheiro = "teste";
        $fichatecnica->Observacoes = "teste";
        $fichatecnica->Consulta_idConsulta= "1";

        return $fichatecnica;
    }

    public function testFtecnicaValida()
    {
        $fichatecnica = new FichaTecnica();

        $this->assertTrue($fichatecnica->validate());
    }

    public function testConsulta_idConsultaFtecnicaVazio()
    {
        $fichatecnica = $this->getFtecnicaValida();

        $fichatecnica->Consulta_idConsulta = "";

        $this->assertTrue($fichatecnica->validate());
    }

    public function testAtualizarRegisto()
    {

        $this->tester->haveRecord(FichaTecnica::class, ['Ficheiro' => 'teste alterado', 'Observacoes' => 'teste alterado', 'Consulta_idConsulta' => '1']);

        $u = FichaTecnica::findOne(['Ficheiro' => 'teste alterado']);
        $u->Ficheiro = "asd";
        $u->save();

    }

    public function testRemoverRegisto()
    {
        $this->tester->haveRecord(FichaTecnica::class, ['Ficheiro' => 'teste alterado', 'Observacoes' => 'teste alterado', 'Consulta_idConsulta' => '1'], "Registo inexistente!");

        $u = FichaTecnica::findOne(['Ficheiro' => 'teste alterado']);
        $u->delete();

        $this->tester->cantSeeRecord(FichaTecnica::class, ['Ficheiro' => 'teste alterado', 'Observacoes' => 'teste alterado', 'Consulta_idConsulta' => '1']);
    }


}