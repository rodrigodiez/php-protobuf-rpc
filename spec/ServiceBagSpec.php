<?php

namespace spec\RodrigoDiez\PHPProtobufRPC;

use RodrigoDiez\PHPProtobufRPC\ServiceBag;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;


class ServiceBagSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ServiceBag::class);
    }

    function it_implements_ContainerInterface()
    {
        $this->shouldImplement(ContainerInterface::class);
    }

    function it_allows_to_retrieve_stored_services_by_id(\StdClass $service)
    {
        $this->set('foo.bar', $service);
        $this->get('foo.bar')->shouldBe($service);
    }

    function its_has_returns_true_if_service_has_been_set(\StdClass $service)
    {
        $this->set('foo.bar', $service);
        $this->has('foo.bar')->shouldReturn(true);
    }

    function its_has_returns_true_if_service_has_not_been_set()
    {
        $this->has('foo.bar')->shouldReturn(false);
    }

    function its_get_throws_NotFoundExceptionInterface_if_service_has_not_been_set()
    {
        $this->shouldThrow(NotFoundExceptionInterface::class)->during('get', ['foo.bar']);
    }
}
