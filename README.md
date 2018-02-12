# php-protobuf-rpc
---
Easily create PHP RPC services based on [Google Protobuffers](https://developers.google.com/protocol-buffers/) and interact with them  over any transport protocol

## See also
- [Symfony ProtobufRPCBundle](https://github.com/rodrigodiez/protobuf-rpc-bundle) integrates php-protobuf-rpc into [Symfony PHP Framework](https://symfony.com/)


```php
<?php

class ServiceResolver
{
    public function __construct(ServiceBag $services);
    public function resolve(string $serviceId, $serviceMethod) : callable
}

class ServiceBag
{
    public function add($serviceId, $service);
    public function find($serviceId);
}

class RPCKernel
{
    public function __construct(ServiceResolver);
    public function handleRaw($serviceId, $method, $message);
    {
        $service = $this->serviceResolver->resolve($serviceId, $method);
        $reflection = new \ReflectionMethod($service[0], $service[1]);
        $requestParam = $reflection->getParameters()[0];

        if(!$requestParam instance of \Google\Protobuf\Internal\Message) {

        }

        $request = new $requestParam->getType()();
        $request->mergeFromString($message);

        $reponse = call_user_func($service, $request);

        if(!$requestParam instance of \Google\Protobuf\Internal\Message) {

        }

        return $response->serializeToString();

    }
}
```
