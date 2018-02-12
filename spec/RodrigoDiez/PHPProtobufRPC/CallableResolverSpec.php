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

    function it_returns_a_callable_for_the_provided_service_and_method(ContainerInterface $container, FooService $fooService)
    {
        $this->beConstructedWith($container);
        $container->get('foo.id')->shouldBeCalled()->willReturn($fooService);

        $this->resolve('foo.id', 'method')->shouldBeCallable();
    }

    public function getMatchers(): array
    {
        return [
            'beCallable' => function ($subject) {
                return is_callable($subject) && method_exists($subject[0], $subject[1]);
            }
        ];
    }
}

class FooService {
    public function method(){}
}
