<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookTable extends Migration
{
    public function up(){
        // Judul Buku, Kategori Buku (dropdown), Deskripsi, Jumlah, Upload File Buku (PDF) dan Upload Cover Buku (jpeg/jpg/png)

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                // 'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jumlah' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'deskripsi' => [
                'type'       => 'TEXT',
            ],
            'cover' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_buku' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'category_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'unsigned'       => true,
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
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('book');
    }

    public function down(){
        $this->forge->dropForeignKey('category_id', 'category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->dropTable('book');
    }
}
