<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Inbounds extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * An inbound shipment.
	 * @var Inbound[]
	 */
	private array $inbounds = [];


	public function getInbounds(): ?array
	{
		return $this->inbounds;
	}


	public function setInbounds(array $inbounds)
	{
		$this->_checkIfPureArray($inbounds, \HarmSmits\BolComClient\Models\Inbound::class);
		$this->inbounds = $inbounds;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'inbounds' => $this->_convertPureArray($this->getInbounds()),
		);
	}
}
