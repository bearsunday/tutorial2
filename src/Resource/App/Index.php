<?php
namespace MyVendor\Ticket\Resource\App;

use BEAR\Resource\ResourceObject;

class Index extends ResourceObject
{
    public $body = [
        'overview' => 'This is the Tutorial2 REST API',
        'issue' => 'https://github.com/bearsunday/tutorial2/issues',
        '_links' => [
            'self' => [
                'href' => '/',
            ],
            'curies' => [
                'href' => 'rels/{rel}.html',
                'name' => 'tk',
                'templated' => true
            ],
            'tk:ticket' => [
                'href' => '/tickets/{id}',
                'title' => 'Ticket',
                'templated' => true
            ],
            'tk:tickets' => [
                'href' => '/tickets',
                'title' => 'The collection of ticket'
            ]
        ]
    ];

    public function onGet() : ResourceObject
    {
        return $this;
    }
}
