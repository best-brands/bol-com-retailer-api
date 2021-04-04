<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getAmount()
 * @method self setAmount(int $amount)
 * @method null|int getCorrectedStock()
 * @method self setCorrectedStock(int $correctedStock)
 * @method null|bool getManagedByRetailer()
 * @method self setManagedByRetailer(bool $managedByRetailer)
 */
final class Stock extends AModel
{
    /**
     * The amount of stock available for the specified product present in the retailers warehouse. Note: this should
     * not be the FBB stock! Defaults to 0.
     * @var int
     */
    protected ?int $amount = null;

    /**
     * The amount of items in stock minus handled order and minus open orders. As compared to the stock you sent us.
     * When this reaches zero, your offer will not be for sale on the shop.
     * @var int
     */
    protected ?int $correctedStock = null;

    /**
     * Configures whether the retailer manages the stock levels or that bol.com should calculate the corrected stock
     * based on actual open orders. In case the configuration is set to 'false', all open orders are used to
     * calculate the corrected stock. In case the configuration is set to 'true', only orders that are placed after
     * the last offer update are taken into account.
     * @var bool
     */
    protected bool $managedByRetailer;
}
