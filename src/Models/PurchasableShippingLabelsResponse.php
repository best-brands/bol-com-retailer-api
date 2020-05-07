<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class PurchasableShippingLabelsResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var PurchasableShippingLabel[] */
	private array $purchasableShippingLabels = [];


	public function getPurchasableShippingLabels(): ?array
	{
		return $this->purchasableShippingLabels;
	}


	public function setPurchasableShippingLabels(array $purchasableShippingLabels)
	{
		$this->_checkIfPureArray($purchasableShippingLabels, \HarmSmits\BolComClient\Models\PurchasableShippingLabel::class);
		$this->purchasableShippingLabels = $purchasableShippingLabels;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'purchasableShippingLabels' => $this->_convertPureArray($this->getPurchasableShippingLabels()),
		);
	}
}
