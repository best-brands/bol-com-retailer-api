<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getMainReason()
 * @method self setMainReason(string $mainReason)
 * @method null|string getDetailedReason()
 * @method self setDetailedReason(string $detailedReason)
 * @method null|string getCustomerComments()
 * @method self setCustomerComments(string $customerComments)
 */
final class ReturnReason extends AModel
{
    /**
     * The main reason describing why the customer returned this product.
     * @var string
     */
    protected ?string $mainReason = null;

    /**
     * The sub reason describing why the customer returned this product in more detail.
     * @var string
     */
    protected ?string $detailedReason = null;

    /**
     * Additional details from the customer as to why this item was returned.
     * @var string
     */
    protected ?string $customerComments = null;
}
