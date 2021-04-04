<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getRmaId()
 * @method self setRmaId(string $rmaId)
 * @method null|string getOrderId()
 * @method self setOrderId(string $orderId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getTitle()
 * @method self setTitle(string $title)
 * @method null|int getExpectedQuantity()
 * @method self setExpectedQuantity(int $expectedQuantity)
 * @method null|ReturnReason getReturnReason()
 * @method self setReturnReason(ReturnReason $returnReason)
 * @method null|string getTrackAndTrace()
 * @method self setTrackAndTrace(string $trackAndTrace)
 * @method null|string getTransporterName()
 * @method self setTransporterName(string $transporterName)
 * @method null|bool getHandled()
 * @method self setHandled(bool $handled)
 * @method ReturnProcessingResult[] getProcessingResults()
 * @method null|CustomerDetails getCustomerDetails()
 * @method self setCustomerDetails(CustomerDetails $customerDetails)
 */
final class ReturnItem extends AModel
{
    /**
     * The RMA (Return Merchandise Authorization) id that identifies this particular
     * return.
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
     * The product title.
     * @var string
     */
    protected string $title;

    /**
     * The quantity that is expected to be returned by the customer. Note: this can be
     * greater than 1 in case the customer ordered a quantity greater than 1 of the
     * same product in the same customer order.
     * @var int
     */
    protected int $expectedQuantity;

    /** The reason why the customer returned this product. */
    protected ?ReturnReason $returnReason = null;

    /**
     * The track and trace code that is associated with this transport.
     * @var string
     */
    protected ?string $trackAndTrace = null;

    /**
     * The name of the transporter.
     * @var string
     */
    protected ?string $transporterName = null;

    /**
     * Indicates if this return item has been handled (by the retailer).
     * @var bool
     */
    protected bool $handled;

    /** @var ReturnProcessingResult[] */
    protected array $processingResults = [];

    /** Information related to the customer. */
    protected CustomerDetails $customerDetails;

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
