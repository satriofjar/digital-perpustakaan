<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoryTable extends Migration
{
    public function up(){

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ]

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('category');
    }

    public function down(){
        $this->forge->dropTable('category');
    }
}
