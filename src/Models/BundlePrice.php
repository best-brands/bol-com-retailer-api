<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BundlePrice extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The minimum quantity a customer must order in order to receive discount. The
	 * element with value 1 must at least be present. In case of using more elements,
	 * the respective quantities must be in increasing order.
	 * @var int
	 */
	private int $quantity;

	/**
	 * The price per single unit in case the customer orders at least the quantity
	 * provided. When using more than 1 price, the respective prices must be in
	 * decreasing order using 2 decimal precision and dot separated.
	 * @var float
	 */
	private float $price;


	public function getQuantity(): ?int
	{
		return $this->quantity;
	}


	public function setQuantity(int $quantity)
	{
		$this->_checkIntegerBounds($quantity, 1, 24);
		$this->quantity = $quantity;
		return $this;
	}


	public function getPrice(): ?float
	{
		return round($this->price, 2);
	}


	public function setPrice(float $price)
	{
		$this->_checkFloatBounds($price, 1, 9999);
		$this->price = $price;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'quantity' => $this->getQuantity(),
			'price' => $this->getPrice(),
		);
	}
}
