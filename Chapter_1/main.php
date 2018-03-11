<?php
/**
 * Created by PhpStorm.
 * User: Li
 * Date: 2018/3/11
 * Time: 20:20
 */

interface iAggregate
{
    public function iterator();
}

interface iIterator
{
    public function hasNext();

    public function next();
}

class Book
{
    private $name;

    /**
     * Book constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}

class BookShelf implements iAggregate
{
    private $books;
    private $last = 0;

    /**
     * BookShelf constructor.
     */
    public function __construct()
    {
        $this->books = array();
    }

    public function getBookAt($index)
    {
        return $this->books[$index];
    }

    public function appendBook($book)
    {
        $this->books[$this->last] = $book;
        $this->last++;
    }

    public function getLength()
    {
        return $this->last;
    }

    public function iterator()
    {
        return new BookShelfIterator($this);
    }
}

class BookShelfIterator implements iIterator
{
    private $bookShelf;
    private $index;

    /**
     * BookShelfIterator constructor.
     * @param $bookShelf
     */
    public function __construct($bookShelf)
    {
        $this->bookShelf = $bookShelf;
        $this->index = 0;
    }


    public function hasNext()
    {
        if ($this->index < $this->bookShelf->getLength()) {
            return true;
        } else {
            return false;
        }
    }

    public function next()
    {
        $book = $this->bookShelf->getBookAt($this->index);
        $this->index++;
        return $book;
    }
}

function main(){
    $bookShelf = new BookShelf();
    $bookShelf->appendBook(new Book("a"));
    $bookShelf->appendBook(new Book("b"));
    $bookShelf->appendBook(new Book("c"));
    $bookShelf->appendBook(new Book("d"));

    $it = $bookShelf->iterator();

    while ($it->hasNext()){
        $book = $it->next();
        echo $book->getName();
    }

}

main();