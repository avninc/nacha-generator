<?php

namespace Nacha\Field;

use PHPUnit\Framework\TestCase;

class CompanyEntryDescriptionTest extends TestCase {

	public function testUpperCaseTriggerWord() {
		// given
		$entry = new CompanyEntryDescription('no check found');

		// then
		$this->assertEquals('NO CHECK F', (string)$entry);
	}

	public function testUpperCaseTriggerWord_Negative() {
		// given
		$entry = new CompanyEntryDescription('some prod');

		// then
		$this->assertEquals('some prod ', (string)$entry);
	}

}