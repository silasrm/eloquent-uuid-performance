<?php

require_once realpath(__DIR__) . "/../vendor/autoload.php";
require_once realpath(__DIR__) . "/tools.php";

use App\Model\UserOp;

$initMemory = memory_get_usage(true);
setupOptimized(false);

$init = microtime(true);

for ($i = 0; $i < 100000; $i++) {
    UserOp::create(
        [
            'username' => 'alsofronie-binary-' . $i,
            'password' => 'secret'
        ]
    );
}
$endMemory = memory_get_usage(true);
$end = microtime(true);

$total = $end - $init;
$totalMemory = $endMemory - $initMemory;

echo 'Tempo: ', $total, PHP_EOL;
echo 'Memória: ', convert($totalMemory), PHP_EOL;
