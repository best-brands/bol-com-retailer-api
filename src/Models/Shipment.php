<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getShipmentId()
 * @method self setShipmentId(int $shipmentId)
 * @method null|DateTime getShipmentDateTime()
 * @method null|string getShipmentReference()
 * @method self setShipmentReference(string $shipmentReference)
 * @method null|bool getPickUpPoint()
 * @method self setPickUpPoint(bool $pickUpPoint)
 * @method null|ShipmentOrder getOrder()
 * @method self setOrder(ShipmentOrder $order)
 * @method null|ShipmentDetails getShipmentDetails()
 * @method self setShipmentDetails(ShipmentDetails $shipmentDetails)
 * @method null|BillingDetails getBillingDetails()
 * @method self setBillingDetails(BillingDetails $billingDetails)
 * @method ShipmentItem[] getShipmentItems()
 * @method null|ShipmentTransport getTransport()
 * @method self setTransport(ShipmentTransport $transport)
 */
final class Shipment extends \HarmSmits\BolComClient\Models\AModel
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

	/**
	 * Indicates whether this order is shipped to a Pick Up Point.
	 * @var bool
	 */
	protected ?bool $pickUpPoint = null;

	protected ShipmentOrder $order;

	protected ?ShipmentDetails $shipmentDetails = null;

	protected ?BillingDetails $billingDetails = null;

	/** @var ShipmentItem[] */
	protected array $shipmentItems = [];

	protected ?ShipmentTransport $transport = null;


	public function setShipmentDateTime($shipmentDateTime): self
	{
		$shipmentDateTime = $this->_parseDate($shipmentDateTime);
		$this->shipmentDateTime = $shipmentDateTime;
		return $this;
	}


    /**
     * @param ShipmentItem[] $shipmentItems
     *
     * @return $this
     */
	public function setShipmentItems(array $shipmentItems): self
	{
		$this->_checkIfPureArray($shipmentItems, \HarmSmits\BolComClient\Models\ShipmentItem::class);
		$this->shipmentItems = $shipmentItems;
		return $this;
	}
}
