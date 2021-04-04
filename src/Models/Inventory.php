<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getBsku()
 * @method self setBsku(string $bsku)
 * @method null|int getGradedStock()
 * @method self setGradedStock(int $gradedStock)
 * @method null|int getRegularStock()
 * @method self setRegularStock(int $regularStock)
 * @method null|string getTitle()
 * @method self setTitle(string $title)
 */
final class Inventory extends AModel
{
    /**
     * The EAN number associated with this product.
     * @var string
     */
    protected string $ean;

    /**
     * The BSKU number associated with this product.
     * @var string
     */
    protected string $bsku;

    /**
     * The stock that is not available for sale anymore.
     * @var int
     */
    protected int $gradedStock;

    /**
     * The stock that is available for sale.
     * @var int
     */
    protected int $regularStock;

    /**
     * The product title.
     * @var string
     */
    protected string $title;
}
