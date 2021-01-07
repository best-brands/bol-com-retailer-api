<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method OfferInsight[] getOfferInsights()
 */
final class OfferInsights extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var OfferInsight[] */
	protected array $offerInsights = [];


    /**
     * @param OfferInsight[] $offerInsights
     *
     * @return $this
     */
	public function setOfferInsights(array $offerInsights): self
	{
		$this->_checkIfPureArray($offerInsights, \HarmSmits\BolComClient\Models\OfferInsight::class);
		$this->offerInsights = $offerInsights;
		return $this;
	}
}
