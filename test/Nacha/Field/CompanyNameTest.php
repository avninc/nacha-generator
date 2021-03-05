<?php

namespace Nacha\Field;

use PHPUnit\Framework\TestCase;

class CompanyNameTest extends TestCase {

	public function testUpperCaseTriggerWord() {
		// given
		$entry = new CompanyName('check destroyed');

		// then
		$this->assertEquals('CHECK DESTROYED ', (string)$entry);
	}

	public function stestUpperCaseTriggerWord_Negative() {
		// given
		$entry = new CompanyEntryDescription('check available');

		// then
		$this->assertEquals('check available', (string)$entry);
	}

}