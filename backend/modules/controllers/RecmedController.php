<?php


namespace backend\modules\controllers;
use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;


class RecmedController extends ActiveController
{
  public $modelClass = 'common\models\ReceitaMedicamento';

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
