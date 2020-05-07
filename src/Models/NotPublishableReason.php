<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class NotPublishableReason extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Error code signalling that the offer is invalid.
	 * @var string
	 */
	private ?string $code = null;

	/**
	 * Error message describing the reason the offer is invalid.
	 * @var string
	 */
	private ?string $description = null;


	public function getCode(): ?string
	{
		return $this->code;
	}


	public function setCode(string $code)
	{
		$this->code = $code;
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


	public function toArray(): array
	{
		return array(
			'code' => $this->getCode(),
			'description' => $this->getDescription(),
		);
	}
}
