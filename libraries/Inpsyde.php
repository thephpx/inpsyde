<?php
/**
 * Created by PhpStorm.
 * User: faisal
 * Date: 2/23/18
 * Time: 10:01 PM
 */

namespace App;

class Inpsyde
{

    private static $instance;
    private $db;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    private function __sleep()
    {
    }

    public function setup($type, &$object)
    {
        $this->{$type} = $object;
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new statc();
        }

        return static::$instance;
    }

}