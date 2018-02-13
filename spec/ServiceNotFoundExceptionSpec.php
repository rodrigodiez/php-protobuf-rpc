<?php

namespace spec\RodrigoDiez\PHPProtobufRPC;

use RodrigoDiez\PHPProtobufRPC\ServiceNotFoundException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Container\NotFoundExceptionInterface;

class ServiceNotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceNotFoundException::class);
    }

    function it_is_an_exception()
    {
        $this->shouldHaveType(\Exception::class);
    }

    function it_implements_NotFoundExceptionInterface()
    {
        $this->shouldHaveType(ServiceNotFoundException::class);
    }
}
