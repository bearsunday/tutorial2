<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Module;

use BEAR\Dotenv\Dotenv;
use BEAR\Package\AbstractAppModule;
use BEAR\Package\PackageModule;
use BEAR\Resource\Module\JsonSchemaModule;
use Ray\AuraSqlModule\AuraSqlModule;
use Ray\IdentityValueModule\IdentityValueModule;
use Ray\MediaQuery\DbQueryConfig;
use Ray\MediaQuery\MediaQueryModule;
use Ray\MediaQuery\Queries;

use function dirname;
use function getenv;

class AppModule extends AbstractAppModule
{
    protected function configure(): void
    {
        (new Dotenv())->load(dirname(__DIR__, 2));
        $this->install(
            new AuraSqlModule(
                (string) getenv('TKT_DB_DSN'),
                (string) getenv('TKT_DB_USER'),
                (string) getenv('TKT_DB_PASS'),
                (string) getenv('TKT_DB_SLAVE')
            )
        );
        $this->install(
            new MediaQueryModule(
                Queries::fromDir($this->appMeta->appDir . '/src/Query'),
                [
                    new DbQueryConfig($this->appMeta->appDir . '/var/sql'),
                ]
            )
        );
        $this->install(new IdentityValueModule());
        $this->install(
            new JsonSchemaModule(
                $this->appMeta->appDir . '/var/schema/response',
                $this->appMeta->appDir . '/var/schema/request'
            )
        );
        $this->install(new PackageModule());
    }
}
