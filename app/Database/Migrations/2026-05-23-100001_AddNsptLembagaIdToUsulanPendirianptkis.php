<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNsptLembagaIdToUsulanPendirianptkis extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tr_usulan_pendirianptkis', [
            'nspt_lembaga_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'after'      => 'id',
                'comment'    => 'ID Lembaga dari NSPT untuk tracking NSS generation'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tr_usulan_pendirianptkis', 'nspt_lembaga_id');
    }
}
