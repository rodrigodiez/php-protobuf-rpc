<?php

namespace spec\RodrigoDiez\PHPProtobufRPC;

use RodrigoDiez\PHPProtobufRPC\CallableResolver;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\Container\ContainerInterface;

class CallableResolverSpec extends ObjectBehavior
{
    public function let(ContainerInterface $container)
    {
        $this->beConstructedWith($container);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CallableResolver::class);
    }

    function it_returns_a_callable_for_the_provided_service_and_method(ContainerInterface $container)
    {
        $container->get('foo.id')->shouldBeCalled()->willReturn(new FooService());

        $this->resolve('foo.id', 'method')->shouldBeCallable();
    }

    function it_throws_InvalidArgumentException_if_method_is_not_callable(ContainerInterface $container)
    {
        $container->get('foo.id')->shouldBeCalled()->willReturn(new FooService());

        $this->shouldThrow(\InvalidArgumentException::class)->during('resolve', ['foo.id', 'nonExistantMethod']);
    }

    public function getMatchers(): array
    {
        return [
            'beCallable' => function ($subject) {
                return is_callable($subject);
            }
        ];
    }
}

class FooService {
    public function method(){}
}
