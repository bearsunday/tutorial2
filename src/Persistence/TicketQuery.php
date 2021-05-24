<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Persistence;

use Aura\Sql\ExtendedPdoInterface;
use Aura\SqlQuery\Common\SelectInterface;
use Koriym\QueryLocator\QueryLocatorInterface;
use MyVendor\Ticket\Entity\Ticket;
use MyVendor\Ticket\Query\TicketQueryInterface;

use function assert;
use function sprintf;
use function strpos;
use function substr;

class TicketQuery implements TicketQueryInterface
{
    public function __construct(
        private ExtendedPdoInterface $pdo,
        private SelectInterface $select,
        private QueryLocatorInterface $locator,
    ) {
    }

    public function item(string $id): Ticket
    {
        $origin = $this->locator['ticket_item'];
        $build = $this->select
            ->cols(['*'])->from('ticket') // dummy
            ->where('id = :id')
            ->orderBy(['dateCreated'])
            ->getStatement();
        $sql = $this->merge($origin, $build);
        $item = $this->pdo->fetchObject($sql, ['id' => $id], Ticket::class);
        assert($item instanceof Ticket);

        return $item;
    }

    /**
     * {@inheritDoc}
     */
    public function list(): array
    {
        $origin = $this->locator['ticket_list'];
        $build = $this->select
            ->cols(['*'])->from('ticket') // dummy
            ->limit(5)
            ->orderBy(['dateCreated'])
            ->getStatement();
        $sql =  $this->merge($origin, $build);

        return $this->pdo->fetchObjects($sql, [], Ticket::class);
    }

    private function merge(string $sql, string $build, string $search = 'FROM'): string
    {
        return sprintf(
            '%s %s',
            substr($sql, 0, (int) strpos($sql, $search)),
            substr($build, (int) strpos($build, $search)),
        );
    }
}
