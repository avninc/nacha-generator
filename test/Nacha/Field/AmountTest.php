<?php

namespace Nacha\Field;

use Nacha\Field\InvalidFieldException;
use PHPUnit\Framework\TestCase;

class AmountTest extends TestCase {

	/**
	 * @expectedException \Nacha\Field\InvalidFieldException
	 */
	public function testInvalidLength_Float()
    {
        $this->expectException(InvalidFieldException::class);

		new Amount(100000000.00); // only accepts $99M
	}

	/**
	 * @expectedException \Nacha\Field\InvalidFieldException
	 */
	public function testInvalidLength_String()
    {
        $this->expectException(InvalidFieldException::class);

		new Amount('100000000.00'); // only accepts $99M
	}

	public function testFloatOperations() {
		// given
		$sec = new Amount(100.99);

		// then
		$this->assertEquals('0000010099', (string)$sec);
	}

	public function testFloatStringOperations() {
		// given
		$sec = new Amount('100.99');

		// then
		$this->assertEquals('0000010099', (string)$sec);
	}

	public function testFloatOperations_PreservesZeroDecimals() {
		// given
		$sec = new Amount(100.00);

		// then
		$this->assertEquals('0000010000', (string)$sec);
	}

	public function testFloatStringOperations_PreservesZeroDecimals() {
		// given
		$sec = new Amount('100.00');

		// then
		$this->assertEquals('0000010000', (string)$sec);
	}

}