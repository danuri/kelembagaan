<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNssLogFieldsToUsulanPendirianptkis extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tr_usulan_pendirianptkis', [
            'nss_generated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
                'after'      => 'nspt_lembaga_id',
                'comment'    => 'Waktu NSS di-generate'
            ],
            'nss_status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'after'      => 'nss_generated_at',
                'comment'    => 'Status generate NSS (pending, success, failed)'
            ],
            'nss_response' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'nss_status',
                'comment'    => 'Response data dari NSPT API'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('tr_usulan_pendirianptkis', ['nss_generated_at', 'nss_status', 'nss_response']);
    }
}
