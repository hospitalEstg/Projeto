<?php



namespace backend\modules\controllers;
use common\models\User;
use common\models\LoginForm;
use yii\rest\ActiveController;
use yii\filters\auth\QueryParamAuth;




class RecmedController extends ActiveController
{
  public $modelClass = 'common\models\ReceitaMedicamento';


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
