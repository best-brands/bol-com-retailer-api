<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getQuantity()
 * @method self setQuantity(int $quantity)
 * @method null|string getProcessingResult()
 * @method self setProcessingResult(string $processingResult)
 * @method null|string getHandlingResult()
 * @method self setHandlingResult(string $handlingResult)
 * @method null|DateTime getProcessingDateTime()
 */
final class ReturnProcessingResult extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The processed quantity.
	 * @var int
	 */
	protected ?int $quantity = null;

	/**
	 * The processing result of the return.
	 * @var string
	 */
	protected ?string $processingResult = null;

	/**
	 * The handling result requested by the retailer.
	 * @var string
	 */
	protected ?string $handlingResult = null;

	/**
	 * The date and time in ISO 8601 format when the return was processed.
	 * @var DateTime
	 */
	protected ?DateTime $processingDateTime = null;


	public function setProcessingDateTime($processingDateTime): self
	{
		$processingDateTime = $this->_parseDate($processingDateTime);
		$this->processingDateTime = $processingDateTime;
		return $this;
	}
}
