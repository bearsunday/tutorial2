<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Query;

use MyVendor\Ticket\Entity\Ticket;
use Ray\MediaQuery\Annotation\DbQuery;

interface TicketQueryInterface
{
    #[DbQuery('ticket_item', entity: Ticket::class, type:'row')]
    public function item(string $id): Ticket;

    /**
     * @return array<Ticket>
     */
    #[DbQuery('ticket_list', entity: Ticket::class)]
    public function list(): array;
}
