<?php namespace backend\tests;
 use common\models\Consulta;

class ConsultaTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
     $consulta = new Consulta();

                 $consulta->DataConsulta = "2020-01-15";
                 $consulta->hora = "11:10:00";
                 $consulta->TipoConsulta = "ortopedia";
                 $consulta->Descricao = "teste funcional";
                 $consulta->Estado = "1";
                 $consulta->idMedico = "2";
                 $consulta->idFuncionario = "3";


                 $consulta->save();
    }

    protected function _after()
    {
    }


        public function getConsultaValida()
        {
             $consulta = new Consulta();

             $consulta->DataConsulta = "2020-01-15";
             $consulta->hora = "11:10:00";
             $consulta->TipoConsulta = "ortopedia";
             $consulta->Descricao = 'teste funcional';
             $consulta->Estado = "0";
             $consulta->idMedico = "2";
             $consulta->idFuncionario = "3";

             return $consulta;

        }



      public function testDataConsultaVazio(){

                              $consulta = $this->getConsultaValida();

                              $consulta->DataConsulta = "";
                             //Dá Falso
                              $this->assertFalse($consulta->validate());

             }

        public function testHoraVazio(){

                        $consulta = $this->getConsultaValida();

                        $consulta->hora = "";
                       //Dá Falso
                        $this->assertFalse($consulta->validate());

                   }
          public function testTipoConsultaVazio(){

                    $consulta = $this->getConsultaValida();

                      $consulta->TipoConsulta = "";
                                //Dá Falso
                        $this->assertFalse($consulta->validate());

                            }


                public function testDescricaoVazio(){

                               $consulta = $this->getConsultaValida();

                                 $consulta->Descricao = "";
                                           //Dá Falso
                                   $this->assertFalse($consulta->validate());

                 }




    public function testidMedicoVazio(){

                            $consulta = $this->getConsultaValida();

                            $consulta->idMedico = "";
                           //Dá Falso
                            $this->assertFalse($consulta->validate());

                       }

      public function testidFuncionarioVazio(){

             $consulta = $this->getConsultaValida();

               $consulta->idFuncionario = "";
                                //Dá Falso
                  $this->assertFalse($consulta->validate());

                            }


}