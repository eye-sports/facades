<?php

namespace Facades;

use Agreed\Client\Request;
use InvalidArgumentException;

class Input
{
	private $request = null;

	public function __construct ( Request $request )
	{
		$this->request = $request;
	}

	public function get ( $property )
	{
		if ( ! is_string ( $property ) or empty ( $property ) )
			throw new InvalidArgumentException ( '$property must be a non empty string.' );

		if ( array_key_exists ( $property, $this->request->attributes ) )
			return $this->request->attributes [ $property ];
	}
}