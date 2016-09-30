<?php

use Testing\TestCase;

class LinkTest extends TestCase
{
	public function setUp ( )
	{
		$base = $this->base = 'http://eyedouble.nl/';
		$this->link = new Link ( $base );
	}

	/*
	|--------------------------------------------------------------------------
	| Constructor testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function __construct_withNonStringValueForBase_throwsException ( $value )
	{
		new Link ( $value );
	}

	/*
	|--------------------------------------------------------------------------
	| To method testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function to_withNonStringValue_throwsException ( $value )
	{
		$this->link->to ( $value );
	}

	/**
	 * @test
	 */
	public function to_withStringForPath_returnRequestBasePlusPath ( )
	{
		$path = 'hello';
		$result = $this->base . $path;
		assertThat ( $this->link->to ( $path ), is ( identicalTo ( $result ) ) );
	}
}