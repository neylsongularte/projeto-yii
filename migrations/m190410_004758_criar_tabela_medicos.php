<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190410_004758_criar_tabela_medicos
 */
class m190410_004758_criar_tabela_medicos extends Migration
{


    public function up()
    {
        $this->createTable('medicos', [
            'medico_id' => Schema::TYPE_PK,
            'nome' => 'varchar(100) NOT NULL',
            'sexo' => 'varchar(1) NOT NULL',
            'crm' => 'varchar(13) NOT NULL',
            'cpf' => 'varchar(11) NOT NULL',
            'email' => 'varchar(100) NOT NULL',
            'especialidade_id' => 'integer NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('medicos');
    }
}
