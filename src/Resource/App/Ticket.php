<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Resource\App;

use BEAR\Resource\Annotation\Embed;
use BEAR\Resource\Annotation\JsonSchema;
use BEAR\Resource\Request;
use BEAR\Resource\ResourceObject;
use MyVendor\Ticket\Query\TicketQueryInterface;

use function assert;

class Ticket extends ResourceObject
{
    public function __construct(
        private TicketQueryInterface $query,
    ) {
    }

    #[Embed(src: '/project', rel: 'project')]
    #[JsonSchema('ticket.json')]
    public function onGet(string $id = ''): static
    {
        assert($this->body['project'] instanceof Request);
        $this->body += (array) $this->query->item($id);

        return $this;
    }
}
