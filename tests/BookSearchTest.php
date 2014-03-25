<?php

require __DIR__.'/../classes/BookSearch.php';

class BookSearchTest extends PHPUnit_Framework_TestCase
{
	protected $books;

	public function setUp()
	{
		$this->books = [
		  [ 'title' => 'Introduction to HTML and CSS', 'pages' => 432 ],
		  [ 'title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
		  [ 'title' => 'Object Oriented JavaScript', 'pages' => 42 ],
		  [ 'title' => 'JavaScript Web Applications', 'pages' => 99 ],
		  [ 'title' => 'PHP Object Oriented Solutions', 'pages' => 80 ],
		  [ 'title' => 'PHP Design Patterns', 'pages' => 300 ],
		  [ 'title' => 'Head First Java', 'pages' => 200 ]
		];
	}

	public function test_books_contain_subset()
	{
		$search = new BookSearch($this->books);
		$results = $search->find('javascript',false);

		$expected=[
			['title' => 'Learning JavaScript Design Patterns', 'pages' => 32 ],
			['title' => 'Object Oriented JavaScript', 'pages' => 42],
			['title' => 'JavaScript Web Applications', 'pages' => 99]
		];

		$this->assertEquals($expected, $results);
	}

	public function test_books_exact_match()
	{
		$search = new BookSearch($this->books);

		// returns [ 'title' => JavaScript Web Applications', 'pages' => 99 ]
		$results = $search->find('javascript web applications', true);

		$this->assertEquals([ 'title' => 'JavaScript Web Applications', 'pages' => 99 ], $results[0]);

	}

	public function test_book_doesnt_exist()
	{
		$search = new BookSearch($this->books);

		// returns false
		$results = $search->find('The Definitive Guide to Symfony', true);
		$this->assertFalse($results);
	}
}	