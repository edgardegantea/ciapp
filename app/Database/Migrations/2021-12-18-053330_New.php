<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 128],
            'slug'  => ['type' => 'VARCHAR', 'constraint' => 128],
            'body'  => ['type' => 'TEXT'],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp null',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('news');
    }

    public function down()
    {
        $this->forge->dropTable('news');
    }
}
