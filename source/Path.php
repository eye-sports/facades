<?php

namespace Facades;

use InvalidArgumentException;

class Path
{
	private $paths = array ( );

	public function __construct ( array $paths = array ( ) )
	{
		foreach ( $paths as $name => $path )
			$this->add ( $name, $path );
	}

	public function add ( $name, $path )
	{
		$this->check ( $name );
		$this->check ( $path );
		$this->paths [ $name ] = realpath ( $path );
	}

	public function to ( $name )
	{
		$this->check ( $name );
		if ( ! isset ( $this->paths [ $name ] ) )
			throw new InvalidArgumentException ( "Path $name does not exist" );
		return $this->paths [ $name ];
	}

	private function check ( $value )
	{
		if ( ! is_string ( $value ) or empty ( $value ) )
			throw new InvalidArgumentException ( '$name or $path must be a non empty string.' );
	}
}