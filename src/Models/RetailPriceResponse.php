<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getRetailPrices()
 */
final class RetailPriceResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var RetailPrice[] */
	protected array $retailPrices = [];


	public function setRetailPrices(array $retailPrices): self
	{
		$this->_checkIfPureArray($retailPrices, \HarmSmits\BolComClient\Models\RetailPrice::class);
		$this->retailPrices = $retailPrices;
		return $this;
	}
}
