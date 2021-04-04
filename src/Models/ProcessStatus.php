<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|string getProcessStatusId()
 * @method self setProcessStatusId(string $processStatusId)
 * @method null|string getEntityId()
 * @method self setEntityId(string $entityId)
 * @method null|string getEventType()
 * @method self setEventType(string $eventType)
 * @method null|string getDescription()
 * @method self setDescription(string $description)
 * @method null|string getStatus()
 * @method null|string getErrorMessage()
 * @method self setErrorMessage(string $errorMessage)
 * @method null|DateTime getCreateTimestamp()
 * @method Link[] getLinks()
 */
final class ProcessStatus extends AModel
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_SUCCESS = 'SUCCESS';
    const STATUS_FAILURE = 'FAILURE';
    const STATUS_TIMEOUT = 'TIMEOUT';

    /**
     * The process status id.
     * @var string
     */
    protected ?string $processStatusId = null;

    /**
     * The id of the object being processed. E.g. in case of a shipment process id, you will receive the id of the
     * order item being processed.
     * @var string
     */
    protected ?string $entityId = null;

    /**
     * Name of the requested action that is being processed.
     * @var string
     */
    protected string $eventType;

    /**
     * Describes the action that is being processed.
     * @var string
     */
    protected string $description;

    /**
     * Status of the action being processed.
     * @var string
     */
    protected string $status;

    /**
     * Shows error message if applicable.
     * @var string
     */
    protected ?string $errorMessage = null;

    /**
     * Time of creation of the response.
     * @var DateTime
     */
    protected DateTime $createTimestamp;

    /**
     * Lists available actions applicable to this endpoint.
     * @var Link[]
     */
    protected array $links = [];

    public function setStatus(string $status): self
    {
        $this->_checkEnumBounds($status, [
            "PENDING",
            "SUCCESS",
            "FAILURE",
            "TIMEOUT",
        ]);
        $this->status = $status;
        return $this;
    }

    /**
     * @param DateTime|string|int $createTimestamp
     *
     * @return $this
     */
    public function setCreateTimestamp($createTimestamp): self
    {
        $createTimestamp       = $this->_parseDate($createTimestamp);
        $this->createTimestamp = $createTimestamp;
        return $this;
    }

    /**
     * @param Link[] $links
     *
     * @return $this
     */
    public function setLinks(array $links): self
    {
        $this->_checkIfPureArray($links, Link::class);
        $this->links = $links;
        return $this;
    }
}
