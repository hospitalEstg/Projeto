<?php namespace frontend\tests;

class userTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    


        protected function _before()
        {
            $user = new User();
            $user->username = 'Rodrigo12345';
            $user->generateAuthKey();
            $user->password_hash = '$2y$13$zUtt9u5fUqX6MU6tuETSfOskKC2IjzqoEmb7shmhX3d3ne5sMz8Oy';
            $user->email = 'Rodrigo12345@gmail.com';
            $this->tester->assertTrue($user->validate(), "Utilizador está vazio");
        }

        protected function _after()
        {
        }

        // tests
        public function testValidacaoSucedida()
        {
            $user = new User();
            $user->username = 'Rodrigo123ww4';
            $user->generateAuthKey();
            $user->password_hash = '$2y$13$zUtt9u5QUqX6MU6tuETSfOskKC2IjzqoEmb7shmhX3d3ne5sMz8Oy';
            $user->email = 'Rodrigo123ww4@gmail.com';
            $this->tester->assertTrue($user->validate(), "Utilizador está vazio");
        }

        public function testIdVazio()
        {
            $user = new User();
            $user->id = "";
            $this->tester->assertTrue($user->validate());
        }

        public function testUsernameVazio()
        {
            $user = new User();
            $user->username = "";
            $this->tester->assertTrue($user->validate());
        }

        public function testAuthKeyVazio()
        {
            $user = new User();
            $user->auth_key = "";
            $this->tester->assertTrue($user->validate());
        }

        public function testPassHashVazio()
        {
            $user = new User();
            $user->password_hash = "";
            $this->tester->assertTrue($user->validate());
        }

        public function testEmailVazio()
        {
            $user = new User();
            $user->email = "";
            $this->tester->assertTrue($user->validate());
        }

        public function testRegisto()
        {
            $this->tester->CantseeRecord('common\models\User', ['username'=>'Rodrigo1234']);
            $user = new User();

            $user->username = 'Rodrigo1234';
            $user->generateAuthKey();
            $user->password_hash = '$2y$13$zUtt9u5QUqX6MU6tuETSfOskKC2IjzqoEmb7shmhX3d3ne5sMz8Oy';
            $user->email = 'rodrigo1234@gmail.com';

            $user->save();
            $this->tester->seeRecord('common\models\User', ['username'=>'Rodrigo1234']);
            $this->tester->seeInDatabase('user', ['username' => 'Rodrigo1234', 'email'=>'rodrigo1234@gmail.com']);
        }

        public function testAtualizarRegisto()
        {



            $this->tester->haveRecord('common\models\User', ['username' => 'RodrigoRodrigues', 'auth_key'=>'0qQ6JSVAwmmoY3KkYRib7cJqTZoC63qK', 'password_hash'=>'$z9nC6Ot.5HI.KhZadGT2Z.uOJLuUKjLZU09ssghbOriMp5wA6FHTS', 'email'=>'rodrigoRodrigues@gmail.com']);

            $user = User::findOne(['username' => 'RodrigoRodrigues']);
            $user->username = "Rodrigo12345";
            $user->save();

        }

        public function testDelete(){
            $this->tester->haveRecord('common\models\User', ['username' => 'RodrigoRei', 'auth_key'=>'0qQ6JSVAwmmoY3KkYRib7cJqTZoC63qK', 'password_hash'=>'$z9nC6Ot.5HI.KhZadGT2Z.uOJLuUKjLZU09ssghbOriMp5wA6FHTS', 'email'=>'rodrigoRei@gmail.com']);

            $user = User::findOne(['username' => 'RodrigoRei']);
            $user->delete();

            $this->tester->cantSeeRecord('common\models\User', ['username' => 'RodrigoRei', 'auth_key'=>'0qQ6JSVAwmmoY3KkYRib7cJqTZoC63qK', 'password_hash'=>'$z9nC6Ot.5HI.KhZadGT2Z.uOJLuUKjLZU09ssghbOriMp5wA6FHTS', 'email'=>'rodrigoRei@gmail.com']);
        }
}