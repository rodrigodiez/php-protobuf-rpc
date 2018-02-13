<?php

namespace spec\RodrigoDiez\PHPProtobufRPC;

use RodrigoDiez\PHPProtobufRPC\RpcKernel;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RpcKernelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RpcKernel::class);
    }
}
