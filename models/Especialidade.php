<?php

namespace app\models;

use yii\db\ActiveRecord;

class Especialidade extends ActiveRecord
{

    public static function tableName()
    {
        return 'especialidades';
    }

    public function getLabel()
    {
        return $this->sigla . ' - ' . $this->descricao;
    }

    public function rules()
    {
        return [
            [['sigla', 'descricao'], 'required'],
            [['sigla'], 'string', 'max' => 5],
            [['descricao'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'sigla' => 'Sigla',
            'descricao' => 'Especialidade',
        ];
    }
}
