<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ProcessStatus extends \HarmSmits\BolComClient\Objects\AObject
{
	const STATUS_PENDING = 'PENDING';
	const STATUS_SUCCESS = 'SUCCESS';
	const STATUS_FAILURE = 'FAILURE';
	const STATUS_TIMEOUT = 'TIMEOUT';

	/**
	 * The process status id.
	 * @var int
	 */
	private ?int $id = null;

	/**
	 * The id of the object being processed. E.g. in case of a shipment process id, you
	 * will receive the id of the order item being processed.
	 * @var string
	 */
	private ?string $entityId = null;

	/**
	 * Name of the requested action that is being processed.
	 * @var string
	 */
	private ?string $eventType = null;

	/**
	 * Describes the action that is being processed.
	 * @var string
	 */
	private ?string $description = null;

	/**
	 * Status of the action being processed.
	 * @var string
	 */
	private ?string $status = null;

	/**
	 * Shows error message if applicable.
	 * @var string
	 */
	private ?string $errorMessage = null;

	/**
	 * Time of creation of the response.
	 * @var string
	 */
	private ?string $createTimestamp = null;

	/**
	 * Lists available actions applicable to this endpoint.
	 * @var Link[]
	 */
	private array $links = [];


	public function getId(): ?int
	{
		return $this->id;
	}


	public function setId(int $id)
	{
		$this->id = $id;
		return $this;
	}


	public function getEntityId(): ?string
	{
		return $this->entityId;
	}


	public function setEntityId(string $entityId)
	{
		$this->entityId = $entityId;
		return $this;
	}


	public function getEventType(): ?string
	{
		return $this->eventType;
	}


	public function setEventType(string $eventType)
	{
		$this->eventType = $eventType;
		return $this;
	}


	public function getDescription(): ?string
	{
		return $this->description;
	}


	public function setDescription(string $description)
	{
		$this->description = $description;
		return $this;
	}


	public function getStatus(): ?string
	{
		return $this->status;
	}


	public function setStatus(string $status)
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


	public function getErrorMessage(): ?string
	{
		return $this->errorMessage;
	}


	public function setErrorMessage(string $errorMessage)
	{
		$this->errorMessage = $errorMessage;
		return $this;
	}


	public function getCreateTimestamp(): ?string
	{
		return $this->createTimestamp;
	}


	public function setCreateTimestamp(string $createTimestamp)
	{
		$this->createTimestamp = $createTimestamp;
		return $this;
	}


	public function getLinks(): ?array
	{
		return $this->links;
	}


	public function setLinks(array $links)
	{
		$this->_checkIfPureArray($links, \HarmSmits\BolComClient\Models\Link::class);
		$this->links = $links;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'id' => $this->getId(),
			'entityId' => $this->getEntityId(),
			'eventType' => $this->getEventType(),
			'description' => $this->getDescription(),
			'status' => $this->getStatus(),
			'errorMessage' => $this->getErrorMessage(),
			'createTimestamp' => $this->getCreateTimestamp(),
			'links' => $this->_convertPureArray($this->getLinks()),
		);
	}
}
