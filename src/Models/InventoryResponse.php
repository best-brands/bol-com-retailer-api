<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|array getInventory()
 */
final class InventoryResponse extends AModel
{
    /** @var Inventory[] */
    protected array $inventory = [];

    /**
     * @param Inventory[] $inventory
     *
     * @return $this
     */
    public function setInventory(array $inventory): self
    {
        $this->_checkIfPureArray($inventory, Inventory::class);
        $this->inventory = $inventory;
        return $this;
    }
}
