<?php

namespace Nacha\Record;

use PHPUnit\Framework\TestCase;

class BlockTest extends TestCase {

	public function testBatchHeader_AllFields() {
		// given
		$block = new Block;

		// then
		$this->assertEquals(94, strlen((string)$block));
	}

}