<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 * @method null|int getQuantityReturned()
 * @method null|string getHandlingResult()
 */
final class CreateReturnRequest extends \HarmSmits\BolComClient\Models\AModel
{
	const HANDLING_RESULT_RETURN_RECEIVED = 'RETURN_RECEIVED';
	const HANDLING_RESULT_EXCHANGE_PRODUCT = 'EXCHANGE_PRODUCT';
	const HANDLING_RESULT_RETURN_DOES_NOT_MEET_CONDITIONS = 'RETURN_DOES_NOT_MEET_CONDITIONS';
	const HANDLING_RESULT_REPAIR_PRODUCT = 'REPAIR_PRODUCT';
	const HANDLING_RESULT_CUSTOMER_KEEPS_PRODUCT_PAID = 'CUSTOMER_KEEPS_PRODUCT_PAID';

	/**
	 * The id for the order item (1 order can have multiple order items).
	 * @var string
	 */
	protected string $orderItemId;

	/**
	 * The quantity of items returned.
	 * @var int
	 */
	protected int $quantityReturned;

	/**
	 * The handling result requested by the retailer.
	 * @var string
	 */
	protected string $handlingResult;


	public function setQuantityReturned(int $quantityReturned): self
	{
		$this->_checkIntegerBounds($quantityReturned, 1, 9999);
		$this->quantityReturned = $quantityReturned;
		return $this;
	}


	public function setHandlingResult(string $handlingResult): self
	{
		$this->_checkEnumBounds($handlingResult, [
			"RETURN_RECEIVED",
			"EXCHANGE_PRODUCT",
			"RETURN_DOES_NOT_MEET_CONDITIONS",
			"REPAIR_PRODUCT",
			"CUSTOMER_KEEPS_PRODUCT_PAID"
		]);
		$this->handlingResult = $handlingResult;
		return $this;
	}
}
