<?php

namespace Nacha\Field;

use Nacha\Field\InvalidFieldException;
use PHPUnit\Framework\TestCase;

class StandardEntryClassTest extends TestCase {

	/**
	 * @expectedException Nacha\Field\InvalidFieldException
	 */
	public function testInvalidType() {
        $this->expectException(InvalidFieldException::class);
		new StandardEntryClass('asd');
	}

	public function testValid() {
		// given
		$sec = new StandardEntryClass('ppd');

		// then
		$this->assertEquals('PPD', (string)$sec);
	}

}