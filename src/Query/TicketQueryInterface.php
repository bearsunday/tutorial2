<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Query;

use Ray\MediaQuery\Annotation\DbQuery;

interface TicketQueryInterface
{
    #[DbQuery('ticket_item')]
    public function item(string $id): array;

    #[DbQuery('ticket_list')]
    public function list(): array;
}
