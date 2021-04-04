<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getOrderItemId()
 * @method self setOrderItemId(string $orderItemId)
 */
final class OrderItem extends AModel
{
    /**
     * The id for the order item (1 order can have multiple order items).
     * @var string
     */
    protected string $orderItemId;
}
