<?php

require_once realpath(__DIR__) . "/../vendor/autoload.php";
require_once realpath(__DIR__) . "/tools.php";

use App\Model\UserOp;
use App\Model\PostOp;

$initMemory = memory_get_usage(true);
setupOptimized(false);

$init = microtime(true);

for ($i = 0; $i < 10; $i++) {
    $user = UserOp::create(
        [
            'username' => 'alsofronie-binary-' . $i,
            'password' => 'secret'
        ]
    );

    for ($j = 0; $j < 100; $j++) {
        PostOp::create(
            [
                'name' => 'First user - post ' . $j,
                'user_id' => $user->id
            ]
        );
    }
}
$endMemory = memory_get_usage(true);
$end = microtime(true);

$total = $end - $init;
$totalMemory = $endMemory - $initMemory;

echo 'Tempo: ', $total, PHP_EOL;
echo 'Memória: ', convert($totalMemory), PHP_EOL;
