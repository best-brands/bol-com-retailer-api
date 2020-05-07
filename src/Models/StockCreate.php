<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class StockCreate extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The amount of stock available for the specified product present in the retailers
	 * warehouse. Note: this should not be the FBB stock! Defaults to 0.
	 * @var int
	 */
	private int $amount;

	/**
	 * Configures whether the retailer manages the stock levels or that bol.com should
	 * calculate the corrected stock based on actual open orders. In case the
	 * configuration is set to 'false', all open orders are used to calculate the
	 * corrected stock. In case the configuration is set to 'true', only orders that
	 * are placed after the last offer update are taken into account.
	 * @var bool
	 */
	private bool $managedByRetailer;


	public function getAmount(): ?int
	{
		return $this->amount;
	}


	public function setAmount(int $amount)
	{
		$this->_checkIntegerBounds($amount, 0, 999);
		$this->amount = $amount;
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
			'managedByRetailer' => $this->getManagedByRetailer(),
		);
	}
}
