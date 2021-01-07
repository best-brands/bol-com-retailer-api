<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getInternalReference()
 * @method self setInternalReference(string $internalReference)
 * @method Attribute[] getAttributes()
 */
final class ProductContent extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * A user defined unique reference to identify the products in the upload.
	 * @var string
	 */
	protected string $internalReference;

	/**
	 * A list of attributes.
	 * @var Attribute[]
	 */
	protected array $attributes = [];


    /**
     * @param Attribute[] $attributes
     *
     * @return $this
     */
	public function setAttributes(array $attributes): self
	{
		$this->_checkIfPureArray($attributes, \HarmSmits\BolComClient\Models\Attribute::class);
		$this->_checkArrayBounds($attributes, 1, 100);
		$this->attributes = $attributes;
		return $this;
	}
}
