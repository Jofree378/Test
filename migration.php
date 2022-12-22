<?php
include 'eloquent.php';
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;
use function Base\printLog;

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->unique('email');
    $table->timestamp('created_at');
    $table->string('password');
});

Capsule::schema()->dropIfExists('posts');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('user_id');
    $table->timestamp('send_at');
    $table->string('message');
    $table->string('image');
});

printLog();