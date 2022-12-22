<?php
namespace Base;
require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'blogs',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

$capsule->getConnection()->enableQueryLog();

class User extends Model
{
    public $table = 'users';
    protected $primaryKey = 'id';

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
}

class Post extends Model
{
    public function userdata()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

function printLog()
{
    $log = Capsule::connection()->getQueryLog();
    foreach ($log as $elem) {
        file_put_contents('Db/log.txt', 0.01 * $elem['time'] . ": " . $elem['query'] . 'bind: ' . json_encode($elem['bindings']) . '<br>');
    }
}