<?php

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
