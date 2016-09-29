<?php

namespace Facades;

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
			( new $provider ( $this->application ) )->register ( );
	}
}