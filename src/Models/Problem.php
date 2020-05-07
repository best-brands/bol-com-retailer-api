<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Problem extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Type URI for this problem. Fixed value: https://api.bol.com/problems.
	 * @var string
	 */
	private ?string $type = null;

	/**
	 * Title describing the nature of the problem.
	 * @var string
	 */
	private ?string $title = null;

	/**
	 * HTTP status returned from the endpoint causing the problem.
	 * @var int
	 */
	private ?int $status = null;

	/**
	 * Detailed error message describing in additional detail what caused the service
	 * to return this problem.
	 * @var string
	 */
	private ?string $detail = null;

	/**
	 * Host identifier describing the server instance that reported the problem.
	 * @var string
	 */
	private ?string $host = null;

	/**
	 * Full URI path of the resource that reported the problem.
	 * @var string
	 */
	private ?string $instance = null;

	/** @var Violation[] */
	private array $violations = [];


	public function getType(): ?string
	{
		return $this->type;
	}


	public function setType(string $type)
	{
		$this->type = $type;
		return $this;
	}


	public function getTitle(): ?string
	{
		return $this->title;
	}


	public function setTitle(string $title)
	{
		$this->title = $title;
		return $this;
	}


	public function getStatus(): ?int
	{
		return $this->status;
	}


	public function setStatus(int $status)
	{
		$this->status = $status;
		return $this;
	}


	public function getDetail(): ?string
	{
		return $this->detail;
	}


	public function setDetail(string $detail)
	{
		$this->detail = $detail;
		return $this;
	}


	public function getHost(): ?string
	{
		return $this->host;
	}


	public function setHost(string $host)
	{
		$this->host = $host;
		return $this;
	}


	public function getInstance(): ?string
	{
		return $this->instance;
	}


	public function setInstance(string $instance)
	{
		$this->instance = $instance;
		return $this;
	}


	public function getViolations(): ?array
	{
		return $this->violations;
	}


	public function setViolations(array $violations)
	{
		$this->_checkIfPureArray($violations, \HarmSmits\BolComClient\Models\Violation::class);
		$this->violations = $violations;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'type' => $this->getType(),
			'title' => $this->getTitle(),
			'status' => $this->getStatus(),
			'detail' => $this->getDetail(),
			'host' => $this->getHost(),
			'instance' => $this->getInstance(),
			'violations' => $this->_convertPureArray($this->getViolations()),
		);
	}
}
