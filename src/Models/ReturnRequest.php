<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getHandlingResult()
 * @method null|int getQuantityReturned()
 */
final class ReturnRequest extends \HarmSmits\BolComClient\Models\AModel
{
	const HANDLING_RESULT_RETURN_RECEIVED = 'RETURN_RECEIVED';
	const HANDLING_RESULT_EXCHANGE_PRODUCT = 'EXCHANGE_PRODUCT';
	const HANDLING_RESULT_RETURN_DOES_NOT_MEET_CONDITIONS = 'RETURN_DOES_NOT_MEET_CONDITIONS';
	const HANDLING_RESULT_REPAIR_PRODUCT = 'REPAIR_PRODUCT';
	const HANDLING_RESULT_CUSTOMER_KEEPS_PRODUCT_PAID = 'CUSTOMER_KEEPS_PRODUCT_PAID';
	const HANDLING_RESULT_STILL_APPROVED = 'STILL_APPROVED';

	/** @var string */
	protected ?string $handlingResult = null;

	/** @var int */
	protected int $quantityReturned;


	public function setHandlingResult(string $handlingResult): self
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


	public function setQuantityReturned(int $quantityReturned): self
	{
		$this->_checkIntegerBounds($quantityReturned, 1, 9999);
		$this->quantityReturned = $quantityReturned;
		return $this;
	}
}
