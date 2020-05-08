<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
