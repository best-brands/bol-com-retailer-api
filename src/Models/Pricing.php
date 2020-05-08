<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Pricing extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * A set of prices (containing a quantity and selling price) that apply to this
	 * offer.
	 * @var BundlePrice[]
	 */
	private array $bundlePrices = [];


	public function getBundlePrices(): ?array
	{
		return $this->bundlePrices;
	}


	public function setBundlePrices(array $bundlePrices)
	{
		$this->_checkIfPureArray($bundlePrices, \HarmSmits\BolComClient\Models\BundlePrice::class);
		$this->_checkArrayBounds($bundlePrices, 1, 4);
		$this->bundlePrices = $bundlePrices;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'bundlePrices' => $this->_convertPureArray($this->getBundlePrices()),
		);
	}
}
