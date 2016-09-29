<?php

namespace Facades

use Agreed\Application;

class Services
{
	protected $providers = array ( );

	public function __construct ( Application $application )
	{
		$this->application = $application;
	}

	public function add ( $service )
	{
		$this->providers [ ] = $service;
	}

	public function register ( )
	{
		foreach ( $this->providers as $provider )
			$this->resolve ( ( new $provider ( $this->application ) ) );
	}

	private function resolve ( ServiceProvider $provider )
	{
		foreach ( $provider->subServices as $subProvider )
			$this->resolve ( new $subProvider ( $this->application ) );
		$provider->register ( );
	}
}