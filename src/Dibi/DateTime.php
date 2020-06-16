<?php

/**
 * This file is part of the Dibi, smart database abstraction layer (https://dibiphp.com)
 * Copyright (c) 2005 David Grudl (https://davidgrudl.com)
 */

declare(strict_types=1);

namespace Dibi;


/**
 * DateTime.
 */
class DateTime extends \DateTime
{
	use Strict;

	/**
	 * @param  string|int  $time
	 */
	public function __construct($time = 'now', \DateTimeZone $timezone = null)
	{
		if (is_numeric($time)) {
			parent::__construct('@' . $time);
			$this->setTimezone($timezone ? $timezone : new \DateTimeZone(date_default_timezone_get()));
		} elseif ($timezone === null) {
			parent::__construct($time);
		} else {
			parent::__construct($time, $timezone);
		}
	}


	public function __toString(): string
	{
		return $this->format('Y-m-d H:i:s.u');
	}
}
