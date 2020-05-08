<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReturnRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	const HANDLING_RESULT_RETURN_RECEIVED = 'RETURN_RECEIVED';
	const HANDLING_RESULT_EXCHANGE_PRODUCT = 'EXCHANGE_PRODUCT';
	const HANDLING_RESULT_RETURN_DOES_NOT_MEET_CONDITIONS = 'RETURN_DOES_NOT_MEET_CONDITIONS';
	const HANDLING_RESULT_REPAIR_PRODUCT = 'REPAIR_PRODUCT';
	const HANDLING_RESULT_CUSTOMER_KEEPS_PRODUCT_PAID = 'CUSTOMER_KEEPS_PRODUCT_PAID';
	const HANDLING_RESULT_STILL_APPROVED = 'STILL_APPROVED';

	/** @var string */
	private ?string $handlingResult = null;

	/** @var int */
	private int $quantityReturned;


	public function getHandlingResult(): ?string
	{
		return $this->handlingResult;
	}


	public function setHandlingResult(string $handlingResult)
	{
		$this->_checkEnumBounds($handlingResult, [
			"RETURN_RECEIVED",
			"EXCHANGE_PRODUCT",
			"RETURN_DOES_NOT_MEET_CONDITIONS",
			"REPAIR_PRODUCT",
			"CUSTOMER_KEEPS_PRODUCT_PAID",
			"STILL_APPROVED"
		]);
		$this->handlingResult = $handlingResult;
		return $this;
	}


	public function getQuantityReturned(): ?int
	{
		return $this->quantityReturned;
	}


	public function setQuantityReturned(int $quantityReturned)
	{
		$this->_checkIntegerBounds($quantityReturned, 1, 9999);
		$this->quantityReturned = $quantityReturned;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'handlingResult' => $this->getHandlingResult(),
			'quantityReturned' => $this->getQuantityReturned(),
		);
	}
}
