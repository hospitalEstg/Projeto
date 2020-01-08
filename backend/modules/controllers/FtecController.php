<?php


namespace backend\modules\controllers;
use common\models\User;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;



class FtecController extends ActiveController
{
   public $modelClass = 'common\models\FichaTecnica';

    public function auth($username, $password)
    { $user = User::findByUsername($username);
        if ($user && $user->validatePassword($password)) {
            return $user;
        }
        return null;
    }
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }

}
