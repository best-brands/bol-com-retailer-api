<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getReplenishmentId()
 * @method self setReplenishmentId(string $replenishmentId)
 * @method null|string getReference()
 * @method self setReference(string $reference)
 * @method null|DateTime getCreationDateTime()
 * @method ReducedReplenishmentLines[] getLines()
 * @method ReducedInvalidReplenishmentLine[] getInvalidLines()
 */
final class ReducedReplenishment extends AModel
{
    /**
     * The unique identifier of the replenishment.
     * @var string
     */
    protected string $replenishmentId;

    /**
     * Custom user defined reference to identify the replenishment.
     * @var string
     */
    protected string $reference;

    /**
     * The date and time when this replenishment was created. In ISO 8601 format.
     * @var DateTime
     */
    protected DateTime $creationDateTime;

    /** @var ReducedReplenishmentLines[] */
    protected array $lines = [];

    /** @var ReducedInvalidReplenishmentLine[] */
    protected array $invalidLines = [];

    /**
     * @param DateTime|string|int $creationDateTime
     *
     * @return $this
     */
    public function setCreationDateTime($creationDateTime): self
    {
        $creationDateTime       = $this->_parseDate($creationDateTime);
        $this->creationDateTime = $creationDateTime;
        return $this;
    }

    /**
     * @param ReducedReplenishmentLines[] $lines
     *
     * @return $this
     */
    public function setLines(array $lines): self
    {
        $this->_checkIfPureArray($lines, ReducedReplenishmentLines::class);
        $this->lines = $lines;
        return $this;
    }

    /**
     * @param ReducedInvalidReplenishmentLine[] $invalidLines
     *
     * @return $this
     */
    public function setInvalidLines(array $invalidLines): self
    {
        $this->_checkIfPureArray($invalidLines, ReducedInvalidReplenishmentLine::class);
        $this->invalidLines = $invalidLines;
        return $this;
    }
}
