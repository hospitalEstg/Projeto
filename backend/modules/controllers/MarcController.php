<?php

namespace backend\modules\controllers;
use common\models\User;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;





class MarcController extends ActiveController
{
   public $modelClass = 'common\models\MarcacaoConsulta';


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
            unset($actions['index'], $actions['create']);
            return $actions;
        }

        public function actionIndex(){
           $actoken = Yii::$app->request->get("access-token");
            $user = User::findIdentityByAccessToken($actoken);
            return $user->pessoa->marcacao;
        }

        public function actionCreate(){

        }



}
