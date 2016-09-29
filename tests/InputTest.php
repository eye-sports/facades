<?php

namespace Facades\Tests;

use Mockery;
use Facades\Input;
use Testing\TestCase;

class InputTest extends TestCase
{
	private $input, $request = null;

	public function setUp ( )
	{
		$this->input = new Input ( array ( 'name' => 'Aron Wouters') );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 * @dataProvider  nonStringValues
	 */
	public function get_withNonStringValue_throwsException ( $value )
	{
		$this->input->get ( $value );
	}

	/**
	 * @test
	 * @expectedException InvalidArgumentException
	 */
	public function get_withEmptyStringValue_throwsException ( )
	{
		$this->input->get ( '' );
	}

	/**
	 * @test
	 */
	public function get_withPropertyThatDoesNotExistInRequest_returnsNull ( )
	{
		assertThat ( $this->input->get ( 'non existent' ), is ( null ) );
	}

	/**
	 * @test
	 */
	public function get_withPropertyThatDoesExistInRequest_returnsPropertyValue ( )
	{
		assertThat ( $this->input->get ( 'name' ), is ( 'Aron Wouters' ) );
	}
}