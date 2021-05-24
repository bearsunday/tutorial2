<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Ticket extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('ticket', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'uuid')
            ->addColumn('title', 'string')
            ->addColumn('dateCreated', 'datetime')
            ->create();
    }
}
