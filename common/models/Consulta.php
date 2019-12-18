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
}
