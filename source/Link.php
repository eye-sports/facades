<?php

class Link
{
	private $base = null;

	public function __construct ( $base )
	{
		if ( ! is_string ( $base ) )
			throw new InvalidArgumentException ( '$base must be a string' );
		$this->base = $base;
	}

	public function to ( $path )
	{
		if ( ! is_string ( $path ) )
			throw new InvalidArgumentException ( '$path must be a string' );
		return $this->base . $path;
	}
}