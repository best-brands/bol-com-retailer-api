<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
