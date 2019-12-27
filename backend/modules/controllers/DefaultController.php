<?php

namespace backend\modules\controllers;

use yii\web\Controller;
use yii\filters\auth\HttpBasicAuth;

/**
 * Default controller for the `api` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return "ola";
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

    public function auth($username, $password)
    {
     $user = \app\models\User::findByUsername($username);
     if ($user && $user->validatePassword($password))
     {
     return $user;
     } return null;
}

public function checkAccess($action, $model = null, $params = [])
{
 //if ($action === ‘post' or $action === 'delete')
 if ($action === 'create' or $action === 'delete')
 if (\Yii::$app->user->isGuest)
 throw new \yii\web\ForbiddenHttpException('‘Apenas poderá
                                             '.$action.' utilizadores registados…');
                                             }

}
