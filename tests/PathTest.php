<?php

namespace Facades\Tests;

use Facades\Path;
use Testing\TestCase;

class PathTest extends TestCase
{
	private $path = null;

	public function setUp ( )
	{
		$this->path = new Path ( array ( 'application' => __DIR__ ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Add method testing.
	|--------------------------------------------------------------------------
	*/

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function add_withNonStringValueForName_throwsException ( $value )
	{
		$this->path->add ( $value, 'a path' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function add_withEmptyStringForName_throwsException ( )
	{
		$this->path->add ( '', 'a path' );
	}

	/**
	 * @test
	 */
	public function add_withStringForName_setsKeyatPath ( )
	{
		$name = 'storage';
		$this->path->add ( $name, 'a path' );
		assertThat ( $this->property ( $this->path, 'paths' ), hasKeyInArray ( $name ) );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function add_withNonStringValueForPath_throwsException ( $value )
	{
		$this->path->add ( 'name', $value );
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
	public function to_withNonStringValueForName_throwsException ( $value )
	{
		$this->path->to ( $value );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function to_withEmptyStringForName_throwsException (	)
	{
		$this->path->to ( '' );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function to_withPathNameThatDoesNotExistOnPath_throwsException ( )
	{
		$this->path->to ( 'non existent' );
	}

	/**
	 * @test
	 */
	public function to_withPathNameThatDoesExist_returnsPath ( )
	{
		assertThat ( $this->path->to ( 'application' ), is ( identicalTo ( __DIR__ ) ) );
	}
}