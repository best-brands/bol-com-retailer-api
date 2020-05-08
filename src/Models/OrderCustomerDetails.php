<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
