<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Resource\App;

use BEAR\Resource\ResourceObject;

class Project extends ResourceObject
{
    public function onGet(): static
    {
        $this->body = ['title' => 'Project A'];

        return $this;
    }
}
