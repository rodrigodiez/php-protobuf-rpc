<?php

namespace RodrigoDiez\PHPProtobufRPC;

use Psr\Container\ContainerInterface;

class ServiceBag implements ContainerInterface
{
    private $services = [];

    public function get($id)
    {
        if(!$this->has($id))
        {
            throw new ServiceNotFoundException(sprintf("Service '%s' not found", $id));
        }

        return $this->services[$id];
    }

    public function has($id)
    {
        return array_key_exists($id, $this->services);
    }

    public function set($id, $service)
    {
        $this->services[$id] = $service;
    }

}
