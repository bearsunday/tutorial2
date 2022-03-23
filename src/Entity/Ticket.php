<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Entity;

class Ticket
{
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public readonly string $dateCreated
    ) {}
}
