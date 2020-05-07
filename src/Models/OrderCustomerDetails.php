<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class OrderCustomerDetails extends \HarmSmits\BolComClient\Objects\AObject
{
	private AddressDetails $shipmentDetails;

	private AddressDetails $billingDetails;


	public function getShipmentDetails(): ?AddressDetails
	{
		return $this->shipmentDetails;
	}


	public function setShipmentDetails(AddressDetails $shipmentDetails)
	{
		$this->shipmentDetails = $shipmentDetails;
		return $this;
	}


	public function getBillingDetails(): ?AddressDetails
	{
		return $this->billingDetails;
	}


	public function setBillingDetails(AddressDetails $billingDetails)
	{
		$this->billingDetails = $billingDetails;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'shipmentDetails' => $this->getShipmentDetails(),
			'billingDetails' => $this->getBillingDetails(),
		);
	}
}
