<?php

namespace Facades\View;

use ArrayIterator;
use IteratorAggregate;

abstract class Notifications implements IteratorAggregate
{
	abstract public function getIterator ( ) : ArrayIterator;
}