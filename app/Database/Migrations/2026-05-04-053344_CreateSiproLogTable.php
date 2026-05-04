<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiproLogTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'usul_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],
            'endpoint' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'request_data' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'response_data' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status_code' => [
                'type'       => 'INT',
                'constraint' => 5,
                'null'       => true,
            ],
            'is_success' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('sipro_log');
    }

    public function down()
    {
        $this->forge->dropTable('sipro_log');
    }
}
