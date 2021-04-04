<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|int getQuantity()
 * @method self setQuantity(int $quantity)
 * @method null|string getProcessingResult()
 * @method self setProcessingResult(string $processingResult)
 * @method null|string getHandlingResult()
 * @method self setHandlingResult(string $handlingResult)
 * @method null|DateTime getProcessingDateTime()
 */
final class ReturnProcessingResult extends AModel
{
    /**
     * The processed quantity.
     * @var int
     */
    protected int $quantity;

    /**
     * The processing result of the return.
     * @var string
     */
    protected string $processingResult;

    /**
     * The handling result requested by the retailer.
     * @var string
     */
    protected string $handlingResult;

    /**
     * The date and time in ISO 8601 format when the return was processed.
     * @var DateTime
     */
    protected DateTime $processingDateTime;

    /**
     * @param DateTime|int|string $processingDateTime
     *
     * @return $this
     */
    public function setProcessingDateTime($processingDateTime): self
    {
        $processingDateTime       = $this->_parseDate($processingDateTime);
        $this->processingDateTime = $processingDateTime;
        return $this;
    }
}
