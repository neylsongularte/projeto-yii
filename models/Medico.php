<?php

namespace app\models;

use yii\db\ActiveRecord;

class Medico extends ActiveRecord
{

    public static function tableName()
    {
        return 'medicos';
    }

    public function getEspecialidade()
    {
        return $this->hasOne(Especialidade::className(), ['especialidade_id' => 'especialidade_id']);
    }

    public function getSexoFormatado()
    {
        return $this->sexo == 'M' ? 'Masculino' : 'Feminino';
    }

    public function rules()
    {
        return [
            [['nome', 'sexo', 'crm', 'cpf', 'email', 'especialidade_id'], 'required'],
            [['nome'], 'string', 'max' => 100],
            [['sexo'], 'string', 'max' => 1],
            [['crm'], 'string', 'max' => 13],
            [['cpf'], 'string', 'max' => 11],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'crm' => 'CRM',
            'cpf' => 'CPF',
            'email' => 'Email',
            'especialidade_id' => 'Especialidade'
        ];
    }
}
