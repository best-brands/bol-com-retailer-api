<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|array getOfferInsights()
 */
final class OfferInsights extends AModel
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
		$this->_checkIfPureArray($offerInsights, OfferInsight::class);
		$this->offerInsights = $offerInsights;
		return $this;
	}
}
