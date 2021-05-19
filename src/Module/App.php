<?php

declare(strict_types=1);

namespace MyVendor\Ticket\Module;

use BEAR\Resource\ResourceInterface;
use BEAR\Sunday\Extension\Application\AppInterface;
use BEAR\Sunday\Extension\Error\ThrowableHandlerInterface;
use BEAR\Sunday\Extension\Router\RouterInterface;
use BEAR\Sunday\Extension\Transfer\HttpCacheInterface;
use BEAR\Sunday\Extension\Transfer\TransferInterface;

final class App implements AppInterface
{
    public HttpCacheInterface $httpCache;
    public RouterInterface $router;
    public TransferInterface $responder;
    public ResourceInterface $resource;
    public ThrowableHandlerInterface $throwableHandler;

    public function __construct(
        HttpCacheInterface $httpCache,
        RouterInterface $router,
        TransferInterface $responder,
        ResourceInterface $resource,
        ThrowableHandlerInterface $throwableHandler
    ) {
        $this->httpCache = $httpCache;
        $this->router = $router;
        $this->responder = $responder;
        $this->resource = $resource;
        $this->throwableHandler = $throwableHandler;
    }
}
