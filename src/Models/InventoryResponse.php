<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InventoryResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var InventoryOffer[] */
	private array $offers = [];


	public function getOffers(): ?array
	{
		return $this->offers;
	}


	public function setOffers(array $offers)
	{
		$this->_checkIfPureArray($offers, \HarmSmits\BolComClient\Models\InventoryOffer::class);
		$this->offers = $offers;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'offers' => $this->_convertPureArray($this->getOffers()),
		);
	}
}
