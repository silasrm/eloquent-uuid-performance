<?php

function convert($size)
{
	$unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];
	return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.strtoupper($unit[$i]);
}

function getConnection($filename = false)
{
    if($filename === false) {
        $resolver = new \App\Connection\Resolver();
    } else {
        $resolver = new \App\Connection\ResolverDynamic($filename);
    }

    \Illuminate\Database\Eloquent\Model::setConnectionResolver($resolver);
    \Illuminate\Database\Eloquent\Model::setEventDispatcher(new \Illuminate\Events\Dispatcher);

    return \Illuminate\Database\Eloquent\Model::getConnectionResolver()->connection();
}

function setupNormal($memory = true) 
{
    $conn = getConnection(!$memory?realpath(__DIR__) . '/../normal.sqlite':false);
    $schemaBuilder = $conn->getSchemaBuilder();

    $schemaBuilder->create(
        'users', 
        function ($table) {
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        }
    );

    $schemaBuilder->create(
        'posts', 
        function ($table) {
            $table->string('name');
            $table->timestamps();
        }
    );

    $conn->statement('ALTER TABLE `users` ADD `id` BINARY(16); ALTER TABLE `users` ADD PRIMARY KEY (`id`);');
    $conn->statement('ALTER TABLE `posts` ADD COLUMN `id` BINARY(16); ALTER TABLE `posts` ADD PRIMARY KEY (`id`);');
    $conn->statement('ALTER TABLE `posts` ADD COLUMN `user_id` BINARY(16);');
}

function setupOptimized($memory = true) 
{
    $conn = getConnection(!$memory?realpath(__DIR__) . '/../op.sqlite':false);
    $schemaBuilder = $conn->getSchemaBuilder();

    $schemaBuilder->create(
        'usersop', 
        function ($table) {
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        }
    );

    $schemaBuilder->create(
        'postsop', 
        function ($table) {
            $table->string('name');
            $table->timestamps();
        }
    );

    $conn->statement('ALTER TABLE `usersop` ADD `id` BINARY(16); ALTER TABLE `usersop` ADD PRIMARY KEY (`id`);');
    $conn->statement('ALTER TABLE `postsop` ADD COLUMN `id` BINARY(16); ALTER TABLE `postsop` ADD PRIMARY KEY (`id`);');
    $conn->statement('ALTER TABLE `postsop` ADD COLUMN `user_id` BINARY(16);');
}

function setupIncremental($memory = true) 
{
    $conn = getConnection(!$memory?realpath(__DIR__) . '/../incremental.sqlite':false);
    $schemaBuilder = $conn->getSchemaBuilder();

    $schemaBuilder->create(
        'usersinc', 
        function ($table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        }
    );

    $schemaBuilder->create(
        'postsinc', 
        function ($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('usersinc');
        }
    );
}
