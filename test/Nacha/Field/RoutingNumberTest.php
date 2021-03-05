<?php

namespace Nacha\Field;

use Nacha\Field\InvalidFieldException;
use PHPUnit\Framework\TestCase;

class RoutingNumberTest extends TestCase {

	public function testLength() {
		// given
		$nbr = new RoutingNumber('001243123');

		// then
		$this->assertEquals('001243123', (string)$nbr);
	}

	/**
	 * @expectedException \Nacha\Field\InvalidFieldException
	 */
	public function testInvalidLength() {
        $this->expectException(InvalidFieldException::class);
		new RoutingNumber(111101);
	}

}