<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRememberedLoginTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'name' => [
            'type' => 'VARCHAR',
            'constraint' => '128',
        ],
        'email' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'unique' => true,
        ],
        'password_hash' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
        ],
        'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'is_admin' => [
            'type' => 'BOOLEAN',
            'default' => false,
        ],
        'activation_hash' => [
            'type' => 'VARCHAR',
            'constraint' => '64',
            'unique' => true,
        ],
        'is_active' => [
            'type' => 'BOOLEAN',
            'default' => false,
        ],
        'reset_hash' => [
            'type' => 'VARCHAR',
            'constraint' => '64',
            'unique' => true,
        ],
        'reset_expires_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
        'profile_image' => [
            'type' => 'VARCHAR',
            'constraint' => '128',
            'null' => true,
        ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('user');
}

public function down()
{
    $this->forge->dropTable('user');
}

}
