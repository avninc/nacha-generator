<?php

namespace Nacha\Record;

use Nacha\Field\StandardEntryClass;
use PHPUnit\Framework\TestCase;

class BatchHeaderTest extends TestCase {

	public function testBatchHeader_AllFields() {
		// given
		$batchHeader = (new BatchHeader)
			->setServiceClassCode(200)
			->setCompanyName('MY BEST COMP')
			->setCompanyDiscretionaryData('INCLUDES OVERTIME')
			->setCompanyId('1419871234')
			->setStandardEntryClassCode(StandardEntryClass::PPD)
			->setCompanyEntryDescription('PAYROLL')
			->setCompanyDescriptiveDate('0602')
			->setEffectiveEntryDate('0112')
			->setOriginatorStatusCode('2')
			->setOriginatingDFiId('01021234')
			->setBatchNumber(1);

		$this->assertEquals(94, strlen($batchHeader));
		$this->assertEquals('5200MY BEST COMP    INCLUDES OVERTIME   1419871234PPDPAYROLL   0602  0112     2010212340000001', (string)$batchHeader);
	}

	public function testBatchHeader_OptionalFields() {
		// given
		$batchHeader = (new BatchHeader)
			->setServiceClassCode(200)
			->setCompanyName('MY BEST COMP')
			->setCompanyId('1419871234')
			->setStandardEntryClassCode(StandardEntryClass::PPD)
			->setCompanyEntryDescription('PAYROLL')
			->setEffectiveEntryDate('0112')
			->setOriginatorStatusCode('2')
			->setOriginatingDFiId('01021234')
			->setBatchNumber(1);

		$this->assertEquals(94, strlen($batchHeader));
		$this->assertEquals('5200MY BEST COMP                        1419871234PPDPAYROLL         0112     2010212340000001', (string)$batchHeader);
	}

}