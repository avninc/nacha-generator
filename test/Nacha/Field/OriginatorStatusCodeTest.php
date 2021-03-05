<?php

namespace Nacha\Field;

use Nacha\Field\InvalidFieldException;
use PHPUnit\Framework\TestCase;

class OriginatorStatusCodeTest extends TestCase {

	/**
	 * @expectedException Nacha\Field\InvalidFieldException
	 */
	public function testInvalidType() {
        $this->expectException(InvalidFieldException::class);
		new OriginatorStatusCode(3);
	}

	public function testValid() {
		// given
		$sec = new OriginatorStatusCode(OriginatorStatusCode::ORIGINATOR_IS_EXEMPT);

		// then
		$this->assertEquals(OriginatorStatusCode::ORIGINATOR_IS_EXEMPT, (string)$sec);
	}

}