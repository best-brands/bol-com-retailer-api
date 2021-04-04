<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getAttributeId()
 * @method self setAttributeId(string $attributeId)
 * @method RejectionError[] getRejectionErrors()
 */
final class RejectedAttributeResponse extends AModel
{
	/**
	 * Identifier of the attribute from the data model.
	 * @var string
	 */
	protected string $attributeId;

	/** @var RejectionError[] */
	protected array $rejectionErrors = [];

    /**
     * @param RejectionError[] $rejectionErrors
     *
     * @return $this
     */
	public function setRejectionErrors(array $rejectionErrors): self
	{
		$this->_checkIfPureArray($rejectionErrors, RejectionError::class);
		$this->rejectionErrors = $rejectionErrors;
		return $this;
	}
}
