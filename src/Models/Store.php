<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getProductTitle()
 * @method self setProductTitle(string $productTitle)
 * @method CountryCode[] getVisible()
 */
final class Store extends AModel
{
    /**
     * The product title for the product associated with this offer.
     * @var string
     */
    protected ?string $productTitle = null;

    /** @var CountryCode[] */
    protected array $visible = [];

    /**
     * @param CountryCode[] $visible
     *
     * @return $this
     */
    public function setVisible(array $visible): self
    {
        $this->_checkIfPureArray($visible, CountryCode::class);
        $this->visible = $visible;
        return $this;
    }
}
