<?php

namespace Nacha\Record;

use PHPUnit\Framework\TestCase;

class FileHeaderTest extends TestCase {

	public function testFileHeader_AllFields() {
		// given
		$fileHeader = (new FileHeader)
			->setPriorityCode(1)
			->setImmediateDestination('051000033')
			->setImmediateOrigin('059999997')
			->setFileCreationDate('060210')
			->setFileCreationTime('2232')
			->setFormatCode('1')
			->setImmediateDestinationName('ImdDest Name')
			->setImmediateOriginName('ImdOriginName')
			->setReferenceCode('Reference'); // will be truncated

		$this->assertEquals(94, strlen($fileHeader));
		$this->assertEquals('101 051000033 0599999970602102232A094101ImdDest Name           ImdOriginName          Referenc', (string)$fileHeader);
	}

	public function testFileHeader_OptionalFields() {
		// given
		$fileHeader = (new FileHeader)
			->setPriorityCode(1)
			->setImmediateDestination('051000033')
			->setImmediateOrigin('059999997')
			->setFileCreationDate('060210')
			->setFormatCode('1');

		$this->assertEquals(94, strlen($fileHeader));
		$this->assertEquals('101 051000033 059999997060210    A094101                                                      ', (string)$fileHeader);
	}

}