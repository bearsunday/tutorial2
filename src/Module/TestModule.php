<?php
namespace MyVendor\Ticket\Module;

use BEAR\Package\AbstractAppModule;
use Ray\AuraSqlModule\AuraSqlModule;

class TestModule extends AbstractAppModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(
            new AuraSqlModule(
                getenv('TKT_DB_DSN') . '_test',
                getenv('TKT_DB_USER'),
                getenv('TKT_DB_PASS'),
                getenv('TKT_DB_SLAVE')
            )
        );
    }
}
