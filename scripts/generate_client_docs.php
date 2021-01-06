<?php

use HarmSmits\BolComClient\Request;

require dirname(__FILE__) . '/../vendor/autoload.php';

$methods = new ReflectionClass(Request::class);

$comments = [];
foreach ($methods->getMethods() as $method) {
    $params = [];
    foreach ($method->getParameters() as $parameter) {
        $type = $parameter->getType();

        if (strpos($type, '\\') !== false) {
            $type = '\\' . $type;
        }

        if ($parameter->isDefaultValueAvailable()) {
            $params[] = $type . ' $' .  $parameter->getName() . ' = ' . var_export($parameter->getDefaultValue(), true);
        } else {
            $params[] = $type . ' $' .  $parameter->getName();
        }
    }

    $signature = '(' . implode(', ', $params) . ')';

    $comments[] = ' * @method ' . $method->name . $signature;
    $comments[] = ' * @method PromiseInterface ' . $method->name . 'Async' . $signature;
}

echo implode("\n", $comments);