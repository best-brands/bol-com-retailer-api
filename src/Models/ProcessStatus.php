<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|int getId()
 * @method self setId(int $id)
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
 * @method null|array getLinks()
 */
final class ProcessStatus extends \HarmSmits\BolComClient\Models\AModel
{
	const STATUS_PENDING = 'PENDING';
	const STATUS_SUCCESS = 'SUCCESS';
	const STATUS_FAILURE = 'FAILURE';
	const STATUS_TIMEOUT = 'TIMEOUT';

	/**
	 * The process status id.
	 * @var int
	 */
	protected ?int $id = null;

	/**
	 * The id of the object being processed. E.g. in case of a shipment process id, you
	 * will receive the id of the order item being processed.
	 * @var string
	 */
	protected ?string $entityId = null;

	/**
	 * Name of the requested action that is being processed.
	 * @var string
	 */
	protected ?string $eventType = null;

	/**
	 * Describes the action that is being processed.
	 * @var string
	 */
	protected ?string $description = null;

	/**
	 * Status of the action being processed.
	 * @var string
	 */
	protected ?string $status = null;

	/**
	 * Shows error message if applicable.
	 * @var string
	 */
	protected ?string $errorMessage = null;

	/**
	 * Time of creation of the response.
	 * @var DateTime
	 */
	protected ?DateTime $createTimestamp = null;

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
			"TIMEOUT"
		]);
		$this->status = $status;
		return $this;
	}


	public function setCreateTimestamp($createTimestamp): self
	{
		$createTimestamp = $this->_parseDate($createTimestamp);
		$this->createTimestamp = $createTimestamp;
		return $this;
	}


	public function setLinks(array $links): self
	{
		$this->_checkIfPureArray($links, \HarmSmits\BolComClient\Models\Link::class);
		$this->links = $links;
		return $this;
	}
}
