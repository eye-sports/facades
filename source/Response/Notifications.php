<?php

namespace Facades\Response;

use ArrayIterator;
use IteratorAggregate;

abstract class Notifications implements IteratorAggregate
{
	abstract public function getIterator ( ) : ArrayIterator;
}