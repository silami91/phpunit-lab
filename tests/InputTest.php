<?php

require __DIR__.'/../classes/Input.php';

class InputTest extends PHPUnit_Framework_TestCase
{
	public function teardown()
	{
		if(isset($_GET))
		{
			unset($_GET);
		}
	}

	public function test_set_then_get()
	{
		$_GET['email'] = 'dtang@usc.edu';
		$email = Input::get('email'); // 'dtang@usc.edu'

		$this->assertEquals($email,'dtang@usc.edu');
	}

	public function test_get_when_null()
	{
		// notice how i am not setting anything in $_GET here
		$email = Input::get('email'); // null, see assertNull()
		$plan = Input::get('plan', 'standard'); // assertEquals 'standard', since it did not exist in $_GET. You are basically providing a default value here
		
		$this->assertNull($email);
		$this->assertEquals($plan,'standard');
	}
}