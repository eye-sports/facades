<?php

namespace Facades\View;

use Support\Accessibility\Accessible;

class Theme
{
	use Accessible;

	/**
	 * The root directory of the theme.
	 */
	private $directory = '';

	public function __construct ( $path )
	{
		$this->directory = $path;
	}
}