<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGyms extends Migration
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

            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
            ],

            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],

            'phone' => [
                'type'           => 'VARCHAR',
                'constraint'     => 14,
                'comment'        => '(99)99999-9999'
            ],

            'manager' => [
                'type'           => 'VARCHAR',
                'constraint'     => 70,
                'comment'        => 'Coordenador'
            ],

            'address' => [
                'type'           => 'VARCHAR',
                'constraint'     => 128,
                'comment'        => 'Endereço da unidade'
            ],


            'number_students' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'comment'        => 'Número de estudantes'
            ],


            'active' => [
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'default'        => 0,
                'comment'        => '0 => Não, 1 => Sim'
            ],


            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => null,
            ],

            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
                'default'        => null,
            ],
        ]);


        $this->forge->addKey('id', true);
        $this->forge->addKey('name');
        $this->forge->addKey('email');
        $this->forge->addKey('phone');
        $this->forge->addKey('created_at');
        $this->forge->addKey('updated_at');

        $this->forge->createTable('gyms');
    }

    public function down()
    {
        $this->forge->dropTable('gyms');
    }
}
