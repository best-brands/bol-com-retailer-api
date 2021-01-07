<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getInternalReference()
 * @method self setInternalReference(string $internalReference)
 * @method RejectedAttributeResponse[] getRejectedAttributes()
 * @method null|string getStatus()
 * @method null|int getErrorCode()
 * @method self setErrorCode(int $errorCode)
 * @method null|string getErrorDescription()
 * @method self setErrorDescription(string $errorDescription)
 */
final class ProductContentResponse extends \HarmSmits\BolComClient\Models\AModel
{
	const STATUS_VALIDATED_OK = 'VALIDATED_OK';
	const STATUS_VALIDATED_WITH_ATTRIBUTE_FAILURES = 'VALIDATED_WITH_ATTRIBUTE_FAILURES';
	const STATUS_REJECTED = 'REJECTED';
	const STATUS_REJECTED_WITH_ATTRIBUTE_FAILURES = 'REJECTED_WITH_ATTRIBUTE_FAILURES';

	/**
	 * A user defined unique reference to identify the products in the upload.
	 * @var string
	 */
	protected ?string $internalReference = null;

	/** @var RejectedAttributeResponse[] */
	protected array $rejectedAttributes = [];

	/**
	 * The end status of the rejected attribute.
	 * @var string
	 */
	protected ?string $status = null;

	/**
	 * The rejection error code.
	 * @var int
	 */
	protected ?int $errorCode = null;

	/**
	 * The rejection error message explains why the value was rejected.
	 * @var string
	 */
	protected ?string $errorDescription = null;


    /**
     * @param RejectedAttributeResponse[] $rejectedAttributes
     *
     * @return $this
     */
	public function setRejectedAttributes(array $rejectedAttributes): self
	{
		$this->_checkIfPureArray($rejectedAttributes, \HarmSmits\BolComClient\Models\RejectedAttributeResponse::class);
		$this->rejectedAttributes = $rejectedAttributes;
		return $this;
	}


	public function setStatus(string $status): self
	{
		$this->_checkEnumBounds($status, [
			"VALIDATED_OK",
			"VALIDATED_WITH_ATTRIBUTE_FAILURES",
			"REJECTED",
			"REJECTED_WITH_ATTRIBUTE_FAILURES"
		]);
		$this->status = $status;
		return $this;
	}
}
