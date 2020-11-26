<?php

namespace Migration;

use Spiral\Migrations\Migration;

class OrmDefault465c5a15eea43026076a2cc10ed458b0 extends Migration
{
    protected const DATABASE = 'default';

    public function up()
    {
        $this->table('contacts')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('name', 'string', [
                'nullable' => false,
                'default'  => null,
                'size'     => 255
            ])
            ->setPrimaryKeys(["id"])
            ->create();
        
        $this->table('users')
            ->addColumn('name', 'string', [
                'nullable' => false,
                'default'  => null,
                'size'     => 255
            ])
            ->create();
        
        $this->table('meetings')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('date', 'datetime', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('description', 'text', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('is_accepted', 'boolean', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('created_at', 'datetime', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('contact_id', 'integer', [
                'nullable' => false,
                'default'  => null
            ])
            ->addIndex(["contact_id"], [
                'name'   => 'meetings_index_contact_id_5f81b8d6098ac',
                'unique' => false
            ])
            ->addForeignKey(["contact_id"], 'contacts', ["id"], [
                'name'   => 'meetings_foreign_contact_id_5f81b8d6098c2',
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->setPrimaryKeys(["id"])
            ->create();
        
        $this->table('tokens')
            ->addColumn('id', 'primary', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('created_at', 'date', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('hash', 'string', [
                'nullable' => false,
                'default'  => null,
                'size'     => 255
            ])
            ->addColumn('jwt', 'text', [
                'nullable' => false,
                'default'  => null
            ])
            ->addColumn('contact_id', 'integer', [
                'nullable' => false,
                'default'  => null
            ])
            ->addIndex(["contact_id"], [
                'name'   => 'tokens_index_contact_id_5f81b8d609a3b',
                'unique' => false
            ])
            ->addForeignKey(["contact_id"], 'contacts', ["id"], [
                'name'   => 'tokens_foreign_contact_id_5f81b8d609a48',
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ])
            ->setPrimaryKeys(["id"])
            ->create();
    }

    public function down()
    {
        $this->table('tokens')->drop();
        
        $this->table('meetings')->drop();
        
        $this->table('users')->drop();
        
        $this->table('contacts')->drop();
    }
}
