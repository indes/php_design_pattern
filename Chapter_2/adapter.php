<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 2018/3/13
 * Time: 10:37
 */

class Banner
{
    private $string;

    /**
     * Banner constructor.
     * @param $string
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    public function showWithParen()
    {
        echo "(" . $this->string . ")";
    }

    public function showWidthAster()
    {
        echo "*" . $this->string . "*";
    }
}

interface iPrint
{
    public function printWeak();

    public function printStrong();
}

class PrintBanner extends Banner implements iPrint
{
    public function __construct($string)
    {
        parent::__construct($string);
    }


    public function printWeak()
    {
        $this->showWithParen();
    }

    public function printStrong()
    {
        $this->showWidthAster();
    }

}

function main()
{
    $p = new PrintBanner("hello");
    $p->printStrong();
    $p->printWeak();
}

main();