<?php

namespace common\models;

use app\mosquitto\phpMQTT;
use Yii;

/**
 * This is the model class for table "marcacao_consulta".
 *
 * @property int $idMarcacao_Consulta
 * @property int $Pessoa_idPessoa
 * @property int|null $Consulta_idConsulta
 * @property int $Estado
 * @property string $Descricao
 * @property int $Urgente
 *
 * @property Consulta $consultaIdConsulta
 * @property Pessoa $pessoaIdPessoa
 */
class MarcacaoConsulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcacao_consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Pessoa_idPessoa', 'Descricao', 'Urgente'], 'required'],
            [['Pessoa_idPessoa', 'Consulta_idConsulta', 'Estado', 'Urgente'], 'integer'],
            [['Descricao'], 'string', 'max' => 150],
            [['Consulta_idConsulta'], 'unique'],
            [['Consulta_idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consulta::className(), 'targetAttribute' => ['Consulta_idConsulta' => 'idConsulta']],
            [['Pessoa_idPessoa'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['Pessoa_idPessoa' => 'idPessoa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMarcacao_Consulta' => 'Id Marcacao Consulta',
            'Pessoa_idPessoa' => 'Pessoa Id Pessoa',
            'Consulta_idConsulta' => 'Consulta Id Consulta',
            'Estado' => 'Estado',
            'Descricao' => 'Descricao',
            'Urgente' => 'Urgente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsulta()
    {
        return $this->hasOne(Consulta::className(), ['idConsulta' => 'Consulta_idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'Pessoa_idPessoa']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $idMarcacao_Consulta = $this->idMarcacao_Consulta;
        $Pessoa_idPessoa = $this->Pessoa_idPessoa;
        $Consulta_idConsulta = $this->Consulta_idConsulta;
        $Estado = $this->Estado;
        $Descricao = $this->Descricao;
        $Urgente = $this->Urgente;


        $myObj = new \stdClass();
        $myObj->id = $idMarcacao_Consulta;
        $myObj->id = $Pessoa_idPessoa;
        $myObj->id = $Consulta_idConsulta;
        $myObj->id = $Estado;
        $myObj->id = $Descricao;
        $myObj->id = $Urgente;

        $myJSON = json_encode($myObj);
        if ($insert)
            $this->FazPublish("INSERT", $myJSON);
        else
            $this->FazPublish("UPDATE", $myJSON);
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $prod_id = $this->idMarcacao_Consulta;
        $myObj = new \stdClass();
        $myObj->id = $prod_id;
        $myJSON = json_encode($myObj);
        $this->FazPublish("DELETE", $myJSON);
    }

    public function FazPublish($canal, $msg)
    {
        $server = "127.0.0.1";
        $port = 1883;
        $username = ""; // set your username
        $password = ""; // set your password
        $client_id = "phpMQTT-publisher"; // unique!
        $mqtt = new phpMQTT($server, $port, $client_id);
        if ($mqtt->connect(true, NULL, $username, $password)) {
            $mqtt->publish($canal, $msg, 0);
            $mqtt->close();


        }
        else {file_put_contents("debug.output","Time out");}
    }
}
