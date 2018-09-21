<?php
use Phinx\Migration\AbstractMigration;

class Ticket extends AbstractMigration
{
    public function change()
    {
         $table = $this->table('ticket', ['id' => false, 'primary_key' => ['id']]);
         $table->addColumn('id', 'uuid')
            ->addColumn('title', 'string')
            ->addColumn('description', 'string')
            ->addColumn('status', 'string')
            ->addColumn('assignee', 'string')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime')
            ->create();
    }
}
