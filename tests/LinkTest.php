<?php

namespace Facades\Tests;

use Mockery;
use Facades\Link;
use Testing\TestCase;

class LinkTest extends TestCase
{
	public function setUp ( )
	{
		$request = $this->request = Mockery::mock ( 'Agreed\\Client\\Request', array ( 'http://eyedouble.nl/' ) );
		$this->link = new Link ( $request );
	}

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
		$result = $this->request->base . $path;
		assertThat ( $this->link->to ( $path ), is ( identicalTo ( $result ) ) );
	}
}