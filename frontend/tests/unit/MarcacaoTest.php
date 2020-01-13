<?php namespace frontend\tests;
 use common\models\MarcacaoConsulta;

class MarcacaoTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $marcacao = new MarcacaoConsulta();
            $marcacao->Pessoa_idPessoa = '1';
             //$marcacao->Consulta_idConsulta = '3';
             $marcacao->Estado = "0";
             $marcacao->Descricao = 'teste funcional';
             $marcacao->Urgente = '1';

             $marcacao->save();


    }

    protected function _after()
    {
    }

    // tests
    public function getMarcacaoValida()
    {
         $marcacao = new MarcacaoConsulta();

        $marcacao->Pessoa_idPessoa = '1';
         //$marcacao->Consulta_idConsulta = '3';
         $marcacao->Estado = "0";
         $marcacao->Descricao = 'teste funcional';
         $marcacao->Urgente = '1';

         return $marcacao;

    }

    public function testMarcacaoValida(){
        $marcacao = $this->getMarcacaoValida();

        $this->assertTrue($marcacao->validate());

    }

     public function testIdpessoaVazio(){

             $marcacao = $this->getMarcacaoValida();

             $marcacao->Pessoa_idPessoa = "";
            //Dá Falso
             $this->assertFalse($marcacao->validate());

        }



       /*   public function testEstadoVazio(){

           $marcacao = $this->getMarcacaoValida();

            $marcacao->Estado = "";

             $this->assertFalse($marcacao->validate());

                        }*/

          public function testDescricaoVazio(){
                $marcacao = $this->getMarcacaoValida();
                $marcacao->Descricao = "";
                $this->assertFalse($marcacao->validate());
          }

           public function testUrgenteVazio(){
                  $marcacao = $this->getMarcacaoValida();
                  $marcacao->Urgente = "";
                  $this->assertFalse($marcacao->validate());
                    }

        /* public function GuardarMarcacao(){
        $marcacao = $this->getMarcacaoValida();

        $marcacao->save();
    }*/


    public function testUpdateRegistoExistente()
        {

            $descricao_antiga = 'teste funcional';
            $descricao_nova = 'teste_marcacao';

            $this->tester->seeRecord(MarcacaoConsulta::class, ['Descricao' => $descricao_antiga]);
            $this->tester->dontSeeRecord(MarcacaoConsulta::class, ['Descricao' => $descricao_nova]);

            $marcacao = MarcacaoConsulta::find()->where(['Descricao' => $descricao_antiga])->one();
           // $marcacao = MarcacaoConsulta::findo

            $marcacao->Descricao = $descricao_nova;
            $marcacao->save();

            $this->tester->seeRecord(MarcacaoConsulta::class, ['Descricao' => $descricao_nova]);


        }

     public function testVerMarcacao(){
            $this->tester->seeRecord(MarcacaoConsulta::class, ['Descricao'=>'teste_marcacao']);

     }

}