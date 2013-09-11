<?php

namespace DataMapper;

/**
 * Description of TestMapper
 *
 * @author sanyatuning
 */
class TestMapper extends Base
{
	// Auto-migrate upon instantiation
	public function init()
	{
		$this->migrate();
	}
}
