<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getInventory()
 */
final class InventoryResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var Inventory[] */
	protected array $inventory = [];


	public function setInventory(array $inventory): self
	{
		$this->_checkIfPureArray($inventory, \HarmSmits\BolComClient\Models\Inventory::class);
		$this->inventory = $inventory;
		return $this;
	}
}
