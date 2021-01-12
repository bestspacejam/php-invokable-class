<?php 
namespace Bestspacejam\InvokableClass;

use Bestspacejam\InvokableClass\Exceptions\NotCallableInvoke;

final class InvokableClass
{
    /**
     * @psalm-var class-string
     */
    private string $classname;
    private array $classParams = [];
    
    /**
     * @psalm-param class-string $classname
     */
    public function __construct(string $classname, array $classParams=[])
    {
        $this->classname = $classname;
        $this->classParams = $classParams;
    }
    
    public function __invoke(...$params)
    {
        $callable = new $this->classname(...$this->classParams);
        
        if (!is_callable($callable)) {
            throw new NotCallableInvoke($this->classname);
        }
        
        return $callable(...$params);
    }
}
