<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getAttributeId()
 * @method self setAttributeId(string $attributeId)
 * @method RejectionError[] getRejectionErrors()
 */
final class RejectedAttributeResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * Identifier of the attribute from the data model.
	 * @var string
	 */
	protected ?string $attributeId = null;

	/** @var RejectionError[] */
	protected array $rejectionErrors = [];


    /**
     * @param RejectionError[] $rejectionErrors
     *
     * @return $this
     */
	public function setRejectionErrors(array $rejectionErrors): self
	{
		$this->_checkIfPureArray($rejectionErrors, \HarmSmits\BolComClient\Models\RejectionError::class);
		$this->rejectionErrors = $rejectionErrors;
		return $this;
	}
}
