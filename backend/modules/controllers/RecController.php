<?php


namespace backend\modules\controllers;
use common\models\User;
use common\models\Pessoa;
use common\models\Consulta;
use common\models\MarcacaoConsulta;
use common\models\Receita;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;
use Yii;





class RecController extends ActiveController
{
    public $modelClass = 'common\models\Receita';



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
           $profile = Pessoa::find()->where(['idUser' => $user->id])->one();
           $rec= MarcacaoConsulta::find()->where(['Pessoa_idPessoa' => $profile->idPessoa])->all();
           $ret =  array();
           foreach($rec as $item){
                if($item->Consulta_idConsulta != null){
                    array_push($ret, $item->consulta);


                }
           }
           //$receita = Receita::find()->where(['Consulta_idConsulta' => $ret->idConsulta])->all();
           $receita = array();
           foreach($ret as $item){
            if($item->idConsulta !=null){
                array_push($receita, $item->receitas);
            }
           }

          return $receita;



       }




}