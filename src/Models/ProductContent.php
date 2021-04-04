<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getInternalReference()
 * @method self setInternalReference(string $internalReference)
 * @method Attribute[] getAttributes()
 */
final class ProductContent extends AModel
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
        $this->_checkIfPureArray($attributes, Attribute::class);
        $this->_checkArrayBounds($attributes, 1, 150);
        $this->attributes = $attributes;
        return $this;
    }
}
