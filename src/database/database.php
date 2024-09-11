<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    private static $instance = null;
    private $capsule;

    private function __construct()
    {
        $this->capsule = new Capsule;

        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'sickstem',
            'username'  => 'root',
            'password'  => '123456',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Make this Capsule instance available globally via static methods
        $this->capsule->setAsGlobal();

        // Setup the Eloquent ORM
        $this->capsule->bootEloquent();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getCapsule()
    {
        return $this->capsule;
    }
}
