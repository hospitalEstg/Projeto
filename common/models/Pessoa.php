<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property int $idPessoa
 * @property string $Nome
 * @property int $Idade
 * @property string $DataNascimento
 * @property string $Morada
 * @property string $Email
 * @property int $NumUtenteSaude
 * @property int $NumIDCivil
 * @property string $CedulaProfissional
 * @property string $TipoUtilizador
 *
 * @property Alarme[] $alarmes
 * @property Consulta[] $consultas
 * @property MarcacaoConsulta[] $marcacaoConsultas
 * @property MarcacaoConsulta[] $marcacaoConsultas0
 * @property MarcacaoConsulta[] $marcacaoConsultas1
 */
class Pessoa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pessoa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'Nome', 'Idade', 'DataNascimento', 'Morada', 'Email', 'NumUtenteSaude', 'NumIDCivil', 'TipoUtilizador'], 'required'],
            [['idPessoa', 'Idade', 'NumUtenteSaude', 'NumIDCivil'], 'integer'],
            [['DataNascimento'], 'safe'],
            [['TipoUtilizador'], 'string'],
            [['Nome'], 'string', 'max' => 100],
            [['Morada', 'Email', 'CedulaProfissional'], 'string', 'max' => 45],
            [['idPessoa'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPessoa' => 'Id Pessoa',
            'Nome' => 'Nome',
            'Idade' => 'Idade',
            'DataNascimento' => 'Data Nascimento',
            'Morada' => 'Morada',
            'Email' => 'Email',
            'NumUtenteSaude' => 'Num Utente Saude',
            'NumIDCivil' => 'Num Id Civil',
            'CedulaProfissional' => 'Cedula Profissional',
            'TipoUtilizador' => 'Tipo Utilizador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlarmes()
    {
        return $this->hasMany(Alarme::className(), ['Pessoa_idPessoa' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['fk_Consulta_Medico' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacaoConsultas()
    {
        return $this->hasMany(MarcacaoConsulta::className(), ['Pessoa_idPessoa' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacaoConsultas0()
    {
        return $this->hasMany(MarcacaoConsulta::className(), ['Pessoa_idUtente' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacaoConsultas1()
    {
        return $this->hasMany(MarcacaoConsulta::className(), ['Pessoa_idMedico' => 'idPessoa']);
    }
}
