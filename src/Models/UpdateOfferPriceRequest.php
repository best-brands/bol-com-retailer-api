<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class UpdateOfferPriceRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	private Pricing $pricing;


	public function getPricing(): ?Pricing
	{
		return $this->pricing;
	}


	public function setPricing(Pricing $pricing)
	{
		$this->pricing = $pricing;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'pricing' => $this->getPricing(),
		);
	}
}
