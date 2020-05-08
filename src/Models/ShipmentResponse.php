<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ShipmentResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ReducedShipment[] */
	private array $shipments = [];


	public function getShipments(): ?array
	{
		return $this->shipments;
	}


	public function setShipments(array $shipments)
	{
		$this->_checkIfPureArray($shipments, \HarmSmits\BolComClient\Models\ReducedShipment::class);
		$this->shipments = $shipments;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'shipments' => $this->_convertPureArray($this->getShipments()),
		);
	}
}
