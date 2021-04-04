<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|int getShipmentId()
 * @method self setShipmentId(int $shipmentId)
 * @method null|DateTime getShipmentDateTime()
 * @method null|string getShipmentReference()
 * @method self setShipmentReference(string $shipmentReference)
 * @method null|ReducedShipmentOrder getOrder()
 * @method self setOrder(ReducedShipmentOrder $order)
 * @method ReducedShipmentItem[] getShipmentItems()
 * @method null|ReducedTransport getTransport()
 * @method self setTransport(ReducedTransport $transport)
 */
final class ReducedShipment extends AModel
{
    /**
     * A unique identifier for this shipment.
     * @var int
     */
    protected ?int $shipmentId = null;

    /**
     * The date and time in ISO 8601 format when the order item was shipped.
     * @var DateTime
     */
    protected ?DateTime $shipmentDateTime = null;

    /**
     * Reference supplied by the user when this item was shipped.
     * @var string
     */
    protected ?string $shipmentReference = null;

    protected ReducedShipmentOrder $order;

    /** @var ReducedShipmentItem[] */
    protected array $shipmentItems = [];

    protected ReducedTransport $transport;

    /**
     * @param DateTime|string|int $shipmentDateTime
     *
     * @return $this
     */
    public function setShipmentDateTime($shipmentDateTime): self
    {
        $shipmentDateTime       = $this->_parseDate($shipmentDateTime);
        $this->shipmentDateTime = $shipmentDateTime;
        return $this;
    }

    /**
     * @param ReducedShipmentItem[] $shipmentItems
     *
     * @return $this
     */
    public function setShipmentItems(array $shipmentItems): self
    {
        $this->_checkIfPureArray($shipmentItems, ReducedShipmentItem::class);
        $this->shipmentItems = $shipmentItems;
        return $this;
    }
}
