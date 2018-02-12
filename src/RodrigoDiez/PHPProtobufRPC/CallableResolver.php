<?php

namespace RodrigoDiez\PHPProtobufRPC;

use Psr\Container\ContainerInterface;

class CallableResolver
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function resolve(string $serviceId, string $methodName): callable
    {
        return [$this->container->get($serviceId), $methodName];
    }
}
