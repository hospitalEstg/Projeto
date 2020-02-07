<?php namespace common\tests;
 use common\models\User;

class SignupTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }



    public function getUser(){

        $user = new User();

        $user->username = "ZeManel";
        $user->email = "manel@m.pt";
       $user->password= ("manuel123");

         $user->generateAuthKey();

        return $user;


    }

    public function testUserValido(){

        $user = $this->getUser();

        // Dá verdadeiro
         $this->assertTrue($user->validate());

    }

    public function testUsernameVazio(){

         $user = $this->getUser();

         $user->username = "";
        //Dá Falso
         $this->assertFalse($user->validate());

    }

    public function testEmailVazio(){

             $user = $this->getUser();

             $user->email = "";
            //Dá Falso
             $this->assertFalse($user->validate());

        }

         public function testPasswordVazio(){

                     $user = $this->getUser();

                     $user->password = "";
                    //Dá Falso
                     $this->assertFalse($user->validate());

           }

         public function testEmailValido(){

                     $user = $this->getUser();

                     $user->email = "manel";
                    //Dá Falso
                     $this->assertFalse($user->validate());

                }

        public function testUsernameComprido(){

                $user = $this->getUser();

                $user->username = "xptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxpxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxptoxpxptoxptoxptoxptoxptoxptoxpto";
               //Dá Falso
                $this->assertFalse($user->validate());

           }

           public function testGravarUserValido() {

                $user = $this->getUser();

                $user->save();

           }


}