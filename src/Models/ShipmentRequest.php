<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ShipmentRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Used for administration purposes.
	 * @var string
	 */
	private ?string $shipmentReference = null;

	/**
	 * Specifies shipping label to be used for this shipment. Can be retrieved through
	 * the shipping label endpoint.
	 * @var string
	 */
	private ?string $shippingLabelCode = null;

	private ?TransportInstruction $transport = null;


	public function getShipmentReference(): ?string
	{
		return $this->shipmentReference;
	}


	public function setShipmentReference(string $shipmentReference)
	{
		$this->shipmentReference = $shipmentReference;
		return $this;
	}


	public function getShippingLabelCode(): ?string
	{
		return $this->shippingLabelCode;
	}


	public function setShippingLabelCode(string $shippingLabelCode)
	{
		$this->shippingLabelCode = $shippingLabelCode;
		return $this;
	}


	public function getTransport(): ?TransportInstruction
	{
		return $this->transport;
	}


	public function setTransport(TransportInstruction $transport)
	{
		$this->transport = $transport;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'shipmentReference' => $this->getShipmentReference(),
			'shippingLabelCode' => $this->getShippingLabelCode(),
			'transport' => $this->getTransport(),
		);
	}
}