<?php

namespace Nacha\Record;

use PHPUnit\Framework\TestCase;
use Nacha\Field\TransactionCode;

class CcdEntryTest extends TestCase {

	public function testEntry_AllFields() {
		// given
		$entry = (new CcdEntry)
			->setTransactionCode(TransactionCode::CHECKING_DEBIT)
			->setReceivingDfiId('19101298')
			->setCheckDigit(7)
			->setReceivingDFiAccountNumber('46479999')
			->setAmount('550.00')
			->setReceivingCompanyId('Location 23')
			->setReceivingCompanyName('Best Co 23')
			->setDiscretionaryData('S')
			->setAddendaRecordIndicator(0)
			->setTraceNumber('19101298', 15);

		$this->assertEquals(94, strlen($entry));
		$this->assertEquals('62719101298746479999         0000055000Location 23    Best Co 23            S 0191012980000015', (string)$entry);
	}

	public function testEntry_OptionalFields() {
		// given
		$entry = (new CcdEntry)
			->setTransactionCode(TransactionCode::CHECKING_DEBIT)
			->setReceivingDfiId('19101298')
			->setCheckDigit(7)
			->setReceivingDFiAccountNumber('46479999')
			->setAmount('550.00')
			->setReceivingCompanyName('Best Co 23')
			->setAddendaRecordIndicator(0)
			->setTraceNumber('19101298', 15);

		$this->assertEquals(94, strlen($entry));
		$this->assertEquals('62719101298746479999         0000055000               Best Co 23              0191012980000015', (string)$entry);
	}

}