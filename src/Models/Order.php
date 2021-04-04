<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getOrderId()
 * @method self setOrderId(string $orderId)
 * @method null|bool getPickupPoint()
 * @method self setPickupPoint(bool $pickupPoint)
 * @method null|DateTime getOrderPlacedDateTime()
 * @method null|ShipmentDetails getShipmentDetails()
 * @method self setShipmentDetails(ShipmentDetails $shipmentDetails)
 * @method null|BillingDetails getBillingDetails()
 * @method self setBillingDetails(BillingDetails $billingDetails)
 * @method OrderOrderItem[] getOrderItems()
 */
final class Order extends AModel
{
    /**
     * The order id.
     * @var string
     */
    protected ?string $orderId = null;

    /**
     * Indicates whether this order is shipped to a Pick Up Point.
     * @var bool
     */
    protected ?bool $pickupPoint = null;

    /**
     * The date and time in ISO 8601 format when the order was placed.
     * @var DateTime
     */
    protected ?DateTime $orderPlacedDateTime = null;

    protected ShipmentDetails $shipmentDetails;

    protected ?BillingDetails $billingDetails = null;

    /** @var OrderOrderItem[] */
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
     * @param OrderOrderItem[] $orderItems
     *
     * @return $this
     */
    public function setOrderItems(array $orderItems): self
    {
        $this->_checkIfPureArray($orderItems, OrderOrderItem::class);
        $this->orderItems = $orderItems;
        return $this;
    }
}
