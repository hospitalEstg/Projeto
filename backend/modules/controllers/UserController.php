<?php


namespace backend\modules\controllers;
use common\models\User;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;



class UserController extends ActiveController
{
  public $modelClass = 'common\models\User';

    public $modelLogin = 'common\models\LoginForm';

  public function behaviors()
    {
     $behaviors = parent::behaviors();
     $behaviors['authenticator'] = [
     'class' => QueryParamAuth::className(),
     ];
     return $behaviors;
    }

    public function actions() {
        $actions =parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
       $actoken = Yii::$app->request->get("access-token");
        $user = User::findIdentityByAccessToken($actoken);
        return $user->pessoa;
    }

   /*public function actionCreate(){
    $user = new User;
        $username =Yii::$app->request->post("username");
        $email =Yii::$app->request->post("email");
        $password= Yii::$app->request->post->setPassword($this->password);
        $auth =Yii::$app->request->post(generateAuthKey());
        //$email=Yii::$app->request->post("email");

        $user->save();


    }*/

}
