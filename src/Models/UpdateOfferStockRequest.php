<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getAmount()
 * @method null|bool getManagedByRetailer()
 * @method self setManagedByRetailer(bool $managedByRetailer)
 */
final class UpdateOfferStockRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The amount of stock available for the specified product present in the retailers
	 * warehouse. Note: this should not be the FBB stock! Defaults to 0.
	 * @var int
	 */
	protected int $amount;

	/**
	 * Configures whether the retailer manages the stock levels or that bol.com should
	 * calculate the corrected stock based on actual open orders. In case the
	 * configuration is set to 'false', all open orders are used to calculate the
	 * corrected stock. In case the configuration is set to 'true', only orders that
	 * are placed after the last offer update are taken into account.
	 * @var bool
	 */
	protected bool $managedByRetailer;


	public function setAmount(int $amount): self
	{
		$this->_checkIntegerBounds($amount, 0, 999);
		$this->amount = $amount;
		return $this;
	}
}
