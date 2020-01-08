<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pessoa".
 *
 * @property int $idPessoa
 * @property string $Nome
 * @property string $DataNascimento
 * @property string $Morada
 * @property int $NumUtenteSaude
 * @property int $NumIDCivil
 * @property string $TipoUtilizador
 * @property int $idUser
 *
 * @property Consulta[] $consultas
 * @property Consulta[] $consultas0
 * @property Consulta[] $consultas1
 * @property MarcacaoConsulta[] $marcacaoConsultas
 * @property User $user
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
            [['Nome', 'DataNascimento', 'Morada', 'NumUtenteSaude', 'NumIDCivil', 'TipoUtilizador', 'idUser'], 'required'],
            [['DataNascimento'], 'safe'],
            [['NumUtenteSaude', 'NumIDCivil', 'idUser'], 'integer'],
            [['TipoUtilizador'], 'string'],
            [['Nome'], 'string', 'max' => 100],
            [['Morada'], 'string', 'max' => 45],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
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
            'DataNascimento' => 'Data Nascimento',
            'Morada' => 'Morada',
            'NumUtenteSaude' => 'Num Utente Saude',
            'NumIDCivil' => 'Num Id Civil',
            'TipoUtilizador' => 'Tipo Utilizador',
            'idUser' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas()
    {
        return $this->hasMany(Consulta::className(), ['idFuncionario' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas0()
    {
        return $this->hasMany(Consulta::className(), ['idMedico' => 'idPessoa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultas1()
    {
        return $this->hasMany(Consulta::className(), ['idUtente' => 'idPessoa']);
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }

    /**
         * @return \yii\db\ActiveQuery
         */
        public function getMarcacao()
        {
            return $this->hasMany(MarcacaoConsulta::className(), ['Pessoa_idPessoa' => 'idPessoa']);
        }
}
