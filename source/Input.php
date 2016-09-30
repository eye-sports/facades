<?php

class Input
{
	private $data = null;

	public function __construct ( array $data = array ( ) )
	{
		$this->data = $data;
	}

	public function get ( $property )
	{
		if ( ! is_string ( $property ) or empty ( $property ) )
			throw new InvalidArgumentException ( '$property must be a non empty string.' );

		if ( isset ( $this->data [ $property ] ) )
			return $this->data [ $property ];
	}
}