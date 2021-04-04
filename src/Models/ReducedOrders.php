<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method ReducedOrder[] getOrders()
 */
final class ReducedOrders extends AModel
{
    /** @var ReducedOrder[] */
    protected array $orders = [];

    /**
     * @param ReducedOrder[] $orders
     *
     * @return $this
     */
    public function setOrders(array $orders): self
    {
        $this->_checkIfPureArray($orders, ReducedOrder::class);
        $this->orders = $orders;
        return $this;
    }
}
