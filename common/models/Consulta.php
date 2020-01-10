<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $idConsulta
 * @property string $DataConsulta
 * @property string $hora
 * @property string $TipoConsulta
 * @property string|null $Descricao
 * @property int $Estado
 * @property int $idMedico
 * @property int $idFuncionario
 *
 * @property Pessoa $idFuncionario0
 * @property Pessoa $idMedico0
 * @property Fichatecnica[] $fichatecnicas
 * @property MarcacaoConsulta $marcacaoConsulta
 * @property Receita[] $receitas
 */
class Consulta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consulta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DataConsulta', 'hora', 'TipoConsulta', 'idMedico', 'idFuncionario'], 'required'],
            [['DataConsulta', 'hora'], 'safe'],
            [['Estado', 'idMedico', 'idFuncionario'], 'integer'],
            [['TipoConsulta', 'Descricao'], 'string', 'max' => 45],
            [['idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idFuncionario' => 'idPessoa']],
            [['idMedico'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idMedico' => 'idPessoa']],



        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idConsulta' => 'Id Consulta',
            'DataConsulta' => 'Data Consulta',
            'hora' => 'Hora',
            'TipoConsulta' => 'Tipo Consulta',
            'Descricao' => 'Descricao',
            'Estado' => 'Estado',
            'idMedico' => 'Id Medico',
            'idFuncionario' => 'Id Funcionario',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuncionario0()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMedico0()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idMedico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichatecnicas()
    {
        return $this->hasMany(Fichatecnica::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacao()
    {
        return $this->hasOne(MarcacaoConsulta::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

      public function afterSave($insert, $changedAttributes)
        {
            parent::afterSave($insert, $changedAttributes);


            $DataConsulta = $this->DataConsulta;
            $hora = $this->hora;
            $TipoConsulta = $this->TipoConsulta;
            $Descricao = $this->Descricao;
            $Estado = $this->Estado;
            $idMedico = $this->idMedico;
            $idFuncionario = $this->idFuncionario;


            $myObj = new \stdClass();

            $myObj->id = $DataConsulta;
            $myObj->id = $hora;
            $myObj->id = $TipoConsulta;
            $myObj->id = $Estado;
            $myObj->id = $idMedico;
            $myObj->id = $idFuncionario;

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
