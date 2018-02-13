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

    public function resolve(string $id, string $method): callable
    {
        $callable = [$this->container->get($id), $method];

        if(!is_callable($callable)) {
            throw new \InvalidArgumentException(sprintf('Method "%s" in class "%s" is not callable', $callable[1], get_class($callable[0])));
        }

        return [$this->container->get($id), $method];
    }
}
