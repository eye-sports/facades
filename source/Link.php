<?php

namespace Facades;

use Agreed\Client\Request;
use InvalidArgumentException;

class Link
{
	private $request = null;

	public function __construct ( Request $request )
	{
		$this->request = $request;
	}

	public function to ( $path )
	{
		if ( ! is_string ( $path ) )
			throw new InvalidArgumentException ( '$path must be a string' );
		return $this->request->base . $path;
	}
}