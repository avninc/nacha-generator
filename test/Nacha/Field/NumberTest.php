<?php

namespace Nacha\Field;

use Nacha\Field\InvalidFieldException;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase {

	public function testPadding() {
		// given
		$nbr = new Number(101, 10);

		// then
		$this->assertEquals('0000000101', (string)$nbr);
	}

	public function testMaxPadding() {
		// given
		$nbr = new Number(1234567891, 10);

		// then
		$this->assertEquals('1234567891', (string)$nbr);
	}

	public function testGetValue() {
		$nbr = new Number(500,3);

		$this->assertEquals(500,$nbr->getValue());
	}

	/**
	 * @expectedException \Nacha\Field\InvalidFieldException
	 */
	public function testTruncation() {
        $this->expectException(InvalidFieldException::class);
		new Number(111101, 5);
	}

	/**
	 * @expectedException \Nacha\Field\InvalidFieldException
	 */
	public function testNotNumber() {
        $this->expectException(InvalidFieldException::class);
		new Number("testme", 5);
	}

}