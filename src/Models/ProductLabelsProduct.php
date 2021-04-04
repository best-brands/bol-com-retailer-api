<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|int getQuantity()
 */
final class ProductLabelsProduct extends AModel
{
    /**
     * The EAN number associated with this product.
     * @var string
     */
    protected ?string $ean = null;

    /**
     * The number of products to generate labels for.
     * @var int
     */
    protected int $quantity;

    public function setQuantity(int $quantity): self
    {
        $this->_checkIntegerBounds($quantity, 1, 9999);
        $this->quantity = $quantity;
        return $this;
    }
}
