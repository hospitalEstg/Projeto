<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consulta".
 *
 * @property int $idConsulta
 * @property string $DataConsulta
 * @property string $TipoConsulta
 * @property string $Descricao
 * @property int $Urgente
 * @property int $Estado
 * @property int $idMedico
 * @property int $idFuncionario
 * @property int $idUtente
 *
 * @property Pessoa $funcionario
 * @property Pessoa $medico
 * @property Pessoa $utente
 * @property Fichatecnica[] $fichatecnicas
 * @property MarcacaoConsulta[] $marcacaoConsultas
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
            [['DataConsulta', 'TipoConsulta', 'Urgente', 'idMedico', 'idFuncionario'], 'required'],
            [['DataConsulta'], 'safe'],
            [['Urgente', 'Estado', 'idMedico', 'idFuncionario', 'idUtente'], 'integer'],
            [['TipoConsulta', 'Descricao'], 'string', 'max' => 45],
            [['idFuncionario'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idFuncionario' => 'idPessoa']],
            [['idMedico'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idMedico' => 'idPessoa']],
            [['idUtente'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['idUtente' => 'idPessoa']],
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
            'TipoConsulta' => 'Tipo Consulta',
            'Descricao' => 'Descricao',
            'Urgente' => 'Urgente',
            'Estado' => 'Estado',
            'idMedico' => 'Id Medico',
            'idFuncionario' => 'Id Funcionario',
            'idUtente' => 'Id Utente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idFuncionario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedico()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idMedico']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUtente()
    {
        return $this->hasOne(Pessoa::className(), ['idPessoa' => 'idUtente']);
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
    public function getMarcacaoConsultas()
    {
        return $this->hasMany(MarcacaoConsulta::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReceitas()
    {
        return $this->hasMany(Receita::className(), ['Consulta_idConsulta' => 'idConsulta']);
    }
}
