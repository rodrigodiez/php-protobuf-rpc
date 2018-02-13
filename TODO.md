```php
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
