<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getOrderId()
 * @method self setOrderId(string $orderId)
 * @method null|DateTime getOrderPlacedDateTime()
 * @method ReducedOrderItem[] getOrderItems()
 */
final class ReducedOrder extends AModel
{
    /**
     * The order id.
     * @var string
     */
    protected ?string $orderId = null;

    /**
     * The date and time in ISO 8601 format when the order was placed.
     * @var DateTime
     */
    protected ?DateTime $orderPlacedDateTime = null;

    /** @var ReducedOrderItem[] */
    protected array $orderItems = [];

    /**
     * @param DateTime|string|int $orderPlacedDateTime
     *
     * @return $this
     */
    public function setOrderPlacedDateTime($orderPlacedDateTime): self
    {
        $orderPlacedDateTime       = $this->_parseDate($orderPlacedDateTime);
        $this->orderPlacedDateTime = $orderPlacedDateTime;
        return $this;
    }

    /**
     * @param ReducedOrderItem[] $orderItems
     *
     * @return $this
     */
    public function setOrderItems(array $orderItems): self
    {
        $this->_checkIfPureArray($orderItems, ReducedOrderItem::class);
        $this->orderItems = $orderItems;
        return $this;
    }
}
