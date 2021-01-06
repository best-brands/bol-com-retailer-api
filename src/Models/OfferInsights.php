<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getOfferInsights()
 */
final class OfferInsights extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var OfferInsight[] */
	protected array $offerInsights = [];


	public function setOfferInsights(array $offerInsights): self
	{
		$this->_checkIfPureArray($offerInsights, \HarmSmits\BolComClient\Models\OfferInsight::class);
		$this->offerInsights = $offerInsights;
		return $this;
	}
}
