<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m190410_003430_criar_tabela_especialidades
 */
class m190410_003430_criar_tabela_especialidades extends Migration
{

    public function up()
    {
        $this->createTable('especialidades', [
            'especialidade_id' => Schema::TYPE_PK,
            'sigla' => 'varchar(5) NOT NULL',
            'descricao' => 'varchar(100) NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('especialidades');
    }
}
