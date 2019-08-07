<?php
namespace MyVendor\Ticket\Resource\App;

use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\Resource\Annotation\JsonSchema;
use BEAR\Resource\ResourceObject;
use Ray\Query\Annotation\Query;

/**
 * @Cacheable
 */
class Ticket extends ResourceObject
{
    /**
     * @JsonSchema(schema="ticket.json")
     * @Query("ticket_item_by_id", type="row")
     */
    public function onGet(string $id) : ResourceObject
    {
        unset($id);

        return $this;
    }
}
