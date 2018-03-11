<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 2018/3/11
 * Time: 21:31
 */

class Singleton
{
    private static $singleton = null;

    /**
     * Singleton constructor.
     */
    private function __construct()
    {
    }

    static public function getInstance(): Singleton
    {
        if (null === static::$singleton) {
            static::$singleton = new Singleton();
        }

        return static::$singleton;
    }
}

function main()
{
    echo "start...\n";
    $obj1 = Singleton::getInstance();
    $obj2 = Singleton::getInstance();
    if ($obj1 === $obj2) {
        echo "\$obj1与\$obj2是相同实例";
    }else{
        echo "\$obj1与\$obj2不是相同实例";
    }
}

main();