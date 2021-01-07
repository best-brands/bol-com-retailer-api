<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getRmaId()
 * @method self setRmaId(int $rmaId)
 * @method null|string getOrderId()
 * @method self setOrderId(string $orderId)
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getTitle()
 * @method self setTitle(string $title)
 * @method null|int getExpectedQuantity()
 * @method self setExpectedQuantity(int $expectedQuantity)
 * @method null|string getReturnReason()
 * @method self setReturnReason(string $returnReason)
 * @method null|string getReturnReasonComments()
 * @method self setReturnReasonComments(string $returnReasonComments)
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
final class ReturnItem extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The RMA (Return Merchandise Authorization) id that identifies this particular
	 * return.
	 * @var int
	 */
	protected ?int $rmaId = null;

	/**
	 * The id of the customer order this return item is in.
	 * @var string
	 */
	protected ?string $orderId = null;

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * The product title.
	 * @var string
	 */
	protected ?string $title = null;

	/**
	 * The quantity that is expected to be returned by the customer. Note: this can be
	 * greater than 1 in case the customer ordered a quantity greater than 1 of the
	 * same product in the same customer order.
	 * @var int
	 */
	protected ?int $expectedQuantity = null;

	/**
	 * The reason why the customer returned this product.
	 * @var string
	 */
	protected ?string $returnReason = null;

	/**
	 * Additional details from the customer as to why this item was returned.
	 * @var string
	 */
	protected ?string $returnReasonComments = null;

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
	protected ?bool $handled = null;

	/** @var ReturnProcessingResult[] */
	protected array $processingResults = [];

	protected ?CustomerDetails $customerDetails = null;


    /**
     * @param ReturnProcessingResult[] $processingResults
     *
     * @return $this
     */
	public function setProcessingResults(array $processingResults): self
	{
		$this->_checkIfPureArray($processingResults, \HarmSmits\BolComClient\Models\ReturnProcessingResult::class);
		$this->processingResults = $processingResults;
		return $this;
	}
}
