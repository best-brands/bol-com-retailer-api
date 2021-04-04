<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|int getQuantity()
 * @method self setQuantity(int $quantity)
 * @method null|int getQuantityShipped()
 * @method self setQuantityShipped(int $quantityShipped)
 * @method null|int getQuantityCancelled()
 * @method self setQuantityCancelled(int $quantityCancelled)
 */
final class ReducedOrderItem extends AModel
{
    /**
     * The id for the order item (1 order can have multiple order items).
     * @var string
     */
    protected ?string $orderItemId = null;

    /**
     * The EAN number associated with this product.
     * @var string
     */
    protected ?string $ean = null;

    /**
     * Amount of ordered products for this order item id.
     * @var int
     */
    protected ?int $quantity = null;

    /**
     * Amount of shipped products for this order item id.
     * @var int
     */
    protected ?int $quantityShipped = null;

    /**
     * Amount of cancelled products for this order item id.
     * @var int
     */
    protected ?int $quantityCancelled = null;
}
