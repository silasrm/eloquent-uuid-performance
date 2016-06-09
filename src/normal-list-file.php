<?php

require_once realpath(__DIR__) . "/../vendor/autoload.php";
require_once realpath(__DIR__) . "/tools.php";

use App\Model\User;
use App\Model\Post;

setupNormal(false);

for ($i = 0; $i < 10; $i++) {
    $user = User::create(
        [
            'username' => 'alsofronie-binary-' . $i,
            'password' => 'secret'
        ]
    );

    for ($j = 0; $j < 100; $j++) {
        Post::create(
            [
                'name' => 'First user - post ' . $j,
                'user_id' => $user->id
            ]
        );
    }
}

$init = microtime(true);
$initMemory = memory_get_usage(true);

$users = User::all();
foreach($users as $user) {
    $posts = $user->posts;
    foreach($posts as $post) {
        $post->name;
    }
}

$endMemory = memory_get_usage(true);
$end = microtime(true);

$total = $end - $init;
$totalMemory = $endMemory - $initMemory;

echo 'Tempo: ', $total, PHP_EOL;
echo 'Memória: ', convert($totalMemory), PHP_EOL;

