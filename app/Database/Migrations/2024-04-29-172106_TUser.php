<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TUser extends Migration
{
    public function up()
    {
        // Agregar una nueva tabla
        $this->forge->addField([
            'id_user'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usuario'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '35',
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'role'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '30',
            ],
            
        ]);
        $this->forge->addKey('usuario', true);
        $this->forge->createTable('t_user');
    }

    public function down()
    {
        // Eliminar la tabla si existe
        $this->forge->dropTable('t_user');
    }
}
