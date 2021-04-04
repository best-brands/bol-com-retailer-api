<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getId()
 * @method self setId(string $id)
 * @method AttributeValue[] getValues()
 */
final class Attribute extends AModel
{
    /**
     * Identifier of the attribute from the data model.
     * @var string
     */
    protected string $id;

    /**
     * A list of attribute values.
     * @var AttributeValue[]
     */
    protected array $values = [];

    /**
     * @param AttributeValue[] $values
     *
     * @return $this
     */
    public function setValues(array $values): self
    {
        $this->_checkIfPureArray($values, AttributeValue::class);
        $this->values = $values;
        return $this;
    }
}
