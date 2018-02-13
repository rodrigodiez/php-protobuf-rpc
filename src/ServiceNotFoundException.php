<?php

namespace RodrigoDiez\PHPProtobufRPC;

use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundException extends \Exception implements NotFoundExceptionInterface
{
}
