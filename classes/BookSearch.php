<?php

class BookSearch
{

	protected $books;

	public function __construct($books)
	{
		$this->books = $books;
	}

	public function find($keyword, $exactMatch)
	{
		$arrayOfBooks = array();
		if($exactMatch == true)
		{
			foreach($this->books as $book)
			{
				if(strtolower($book['title']) == strtolower($keyword))
				{
					array_push($arrayOfBooks, $book);
				}
			}
		}
		else
		{
			foreach($this->books as $book)
			{
				if(stristr($book['title'], $keyword) != false)
				{
					array_push($arrayOfBooks, $book);
				}
			}
		}
		if(empty($arrayOfBooks))
		{
			return false;
		}
		return $arrayOfBooks;
	}
}