<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Cancellation extends \HarmSmits\BolComClient\Objects\AObject
{
	const REASON_CODE_OUT_OF_STOCK = 'OUT_OF_STOCK';
	const REASON_CODE_REQUESTED_BY_CUSTOMER = 'REQUESTED_BY_CUSTOMER';
	const REASON_CODE_BAD_CONDITION = 'BAD_CONDITION';
	const REASON_CODE_HIGHER_SHIPCOST = 'HIGHER_SHIPCOST';
	const REASON_CODE_INCORRECT_PRICE = 'INCORRECT_PRICE';
	const REASON_CODE_NOT_AVAIL_IN_TIME = 'NOT_AVAIL_IN_TIME';
	const REASON_CODE_NO_BOL_GUARANTEE = 'NO_BOL_GUARANTEE';
	const REASON_CODE_ORDERED_TWICE = 'ORDERED_TWICE';
	const REASON_CODE_RETAIN_ITEM = 'RETAIN_ITEM';
	const REASON_CODE_TECH_ISSUE = 'TECH_ISSUE';
	const REASON_CODE_UNFINDABLE_ITEM = 'UNFINDABLE_ITEM';
	const REASON_CODE_OTHER = 'OTHER';

	/**
	 * The code representing the reason for cancellation of this item.
	 * @var string
	 */
	private ?string $reasonCode = null;


	public function getReasonCode(): ?string
	{
		return $this->reasonCode;
	}


	public function setReasonCode(string $reasonCode)
	{
		$this->_checkEnumBounds($reasonCode, [
			"OUT_OF_STOCK",
			"REQUESTED_BY_CUSTOMER",
			"BAD_CONDITION",
			"HIGHER_SHIPCOST",
			"INCORRECT_PRICE",
			"NOT_AVAIL_IN_TIME",
			"NO_BOL_GUARANTEE",
			"ORDERED_TWICE",
			"RETAIN_ITEM",
			"TECH_ISSUE",
			"UNFINDABLE_ITEM",
			"OTHER"
		]);
		$this->reasonCode = $reasonCode;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'reasonCode' => $this->getReasonCode(),
		);
	}
}
