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

        $fichatecnica->save();
    }

    public function testFtecnicaValida()
    {
        $fichatecnica = new FichaTecnica();

        $this->assertTrue($fichatecnica->validate());
    }

    public function testConsulta_idConsultaFtecnicaVazio()
    {
        $fichatecnica = new FichaTecnica();

        $fichatecnica->Consulta_idConsulta = "";

        $this->assertTrue($fichatecnica->validate());
    }

}