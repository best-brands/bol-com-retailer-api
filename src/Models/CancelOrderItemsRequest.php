<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method OrderItemCancellation[] getOrderItems()
 */
final class CancelOrderItemsRequest extends AModel
{
    /**
     * List of order items to cancel. Order item id's must belong to the same order.
     * @var OrderItemCancellation[]
     */
    protected array $orderItems = [];

    /**
     * @param OrderItemCancellation[] $orderItems
     *
     * @return $this
     */
    public function setOrderItems(array $orderItems): self
    {
        $this->_checkIfPureArray($orderItems, OrderItemCancellation::class);
        $this->_checkArrayBounds($orderItems, 1, 1);
        $this->orderItems = $orderItems;
        return $this;
    }
}
