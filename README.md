# PHP Invokable Class package

```php
<?php
use Bestspacejam\InvokableClass\InvokableClass;

$invokable = new InvokableClass(SomeClass::class, ['constructor-param-1', 'constructor-param-2']);
$invokable('invoke-method-param-1', 'invoke-method-param-2');
```