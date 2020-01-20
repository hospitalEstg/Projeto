<?php

namespace backend\modules\controllers;
use common\models\User;
use common\models\Pessoa;
use common\models\MarcacaoConsulta;
use common\models\FichaTecnica;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;
use yii\helpers\Json;





class FtecController extends ActiveController
{
   public $modelClass = 'common\models\FichaTecnica';

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
                     $ftec = FichaTecnica::find()->all();
                    // $marcacao = MarcacaoConsulta::find()->where(['Pessoa_idPesoa'=> $profile->idPessoa])->all();

         return $ftec;
        }









}
