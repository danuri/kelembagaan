<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddProdiIdToSiproLogTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('sipro_log', [
            'prodi_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'usul_id',
                'comment'    => 'ID prodi untuk tracking per prodi'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('sipro_log', 'prodi_id');
    }
}
