<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getOrderItems()
 * @method null|string getShipmentReference()
 * @method self setShipmentReference(string $shipmentReference)
 * @method null|string getShippingLabelId()
 * @method self setShippingLabelId(string $shippingLabelId)
 * @method null|TransportInstruction getTransport()
 * @method self setTransport(TransportInstruction $transport)
 */
final class ShipmentRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * List of order items to ship. Order item id's must belong to the same order.
	 * @var OrderItem[]
	 */
	protected array $orderItems = [];

	/**
	 * A user-defined reference that you can provide to add to the shipment. Can be
	 * used for own administration purposes.
	 * @var string
	 */
	protected ?string $shipmentReference = null;

	/**
	 * The identifier of the purchased shipping label.
	 * @var string
	 */
	protected ?string $shippingLabelId = null;

	protected ?TransportInstruction $transport = null;


	public function setOrderItems(array $orderItems): self
	{
		$this->_checkIfPureArray($orderItems, \HarmSmits\BolComClient\Models\OrderItem::class);
		$this->_checkArrayBounds($orderItems, 1, 1);
		$this->orderItems = $orderItems;
		return $this;
	}
}
