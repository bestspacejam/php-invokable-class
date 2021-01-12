<?php 
namespace Bestspacejam\InvokableClass\Tests;

final class InvokableClassMock
{
    private array $params = [];
    
    public function __construct(...$params)
    {
        $this->params = $params;
    }
    
    public function __invoke(...$params): array
    {
        return array_merge($this->params, $params);
    }
}