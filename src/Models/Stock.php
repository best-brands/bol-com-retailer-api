<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Stock extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The amount of stock available for the specified product present in the retailers
	 * warehouse. Note: this should not be the FBB stock! Defaults to 0.
	 * @var int
	 */
	private ?int $amount = null;

	/**
	 * The amount of items in stock minus handled order and minus open orders. As
	 * compared to the stock you sent us. When this reaches zero, your offer will not
	 * be for sale on the shop.
	 * @var int
	 */
	private ?int $correctedStock = null;

	/**
	 * Configures whether the retailer manages the stock levels or that bol.com should
	 * calculate the corrected stock based on actual open orders. In case the
	 * configuration is set to 'false', all open orders are used to calculate the
	 * corrected stock. In case the configuration is set to 'true', only orders that
	 * are placed after the last offer update are taken into account.
	 * @var bool
	 */
	private ?bool $managedByRetailer = null;


	public function getAmount(): ?int
	{
		return $this->amount;
	}


	public function setAmount(int $amount)
	{
		$this->amount = $amount;
		return $this;
	}


	public function getCorrectedStock(): ?int
	{
		return $this->correctedStock;
	}


	public function setCorrectedStock(int $correctedStock)
	{
		$this->correctedStock = $correctedStock;
		return $this;
	}


	public function getManagedByRetailer(): ?bool
	{
		return $this->managedByRetailer;
	}


	public function setManagedByRetailer(bool $managedByRetailer)
	{
		$this->managedByRetailer = $managedByRetailer;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'amount' => $this->getAmount(),
			'correctedStock' => $this->getCorrectedStock(),
			'managedByRetailer' => $this->getManagedByRetailer(),
		);
	}
}
