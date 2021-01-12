<?php 
namespace Bestspacejam\InvokableClass\Tests;

use PHPUnit\Framework\TestCase;
use Bestspacejam\InvokableClass\InvokableClass;
use Bestspacejam\InvokableClass\Exceptions\NotCallableInvoke;

class InvokableClassTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_resolve_class()
    {
        $resolve = new InvokableClass(
            InvokableClassMock::class,
            ['constructor-1', 'constructor-2']
        );
        
        $this->assertEquals(
            ['constructor-1', 'constructor-2', 'one', 'two'],
            $resolve('one', 'two')
        );
    }
    
    /**
     * @test
     */
    public function it_should_throw()
    {
        $resolve = new InvokableClass(\stdClass::class);
        $this->expectException(NotCallableInvoke::class);
        $this->assertInstanceOf(\stdClass::class, $resolve());
    }
}