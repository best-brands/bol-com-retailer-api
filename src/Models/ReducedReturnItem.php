<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getRmaId()
 * @method self setRmaId(string $rmaId)
 * @method null|string getOrderId()
 * @method self setOrderId(string $orderId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|int getExpectedQuantity()
 * @method self setExpectedQuantity(int $expectedQuantity)
 * @method null|ReturnReason getReturnReason()
 * @method self setReturnReason(ReturnReason $returnReason)
 * @method null|bool getHandled()
 * @method self setHandled(bool $handled)
 * @method ReturnProcessingResult[] getProcessingResults()
 */
final class ReducedReturnItem extends AModel
{
    /**
     * The RMA (Return Merchandise Authorization) id that identifies this particular return.
     * @var string
     */
    protected string $rmaId;

    /**
     * The id of the customer order this return item is in.
     * @var string
     */
    protected string $orderId;

    /**
     * The EAN number associated with this product.
     * @var string
     */
    protected string $ean;

    /**
     * The quantity that is expected to be returned by the customer. Note: this can be greater than 1 in case the
     * customer ordered a quantity greater than 1 of the same product in the same customer order.
     * @var int
     */
    protected int $expectedQuantity;

    /** The reason why the customer returned this product. */
    protected ?ReturnReason $returnReason = null;

    /**
     * Indicates if this return item has been handled (by the retailer).
     * @var bool
     */
    protected ?bool $handled = null;

    /** @var ReturnProcessingResult[] */
    protected array $processingResults = [];

    /**
     * @param ReturnProcessingResult[] $processingResults
     *
     * @return $this
     */
    public function setProcessingResults(array $processingResults): self
    {
        $this->_checkIfPureArray($processingResults, ReturnProcessingResult::class);
        $this->processingResults = $processingResults;
        return $this;
    }
}
