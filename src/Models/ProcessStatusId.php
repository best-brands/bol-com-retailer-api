<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ProcessStatusId extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The process status id.
	 * @var int
	 */
	private ?int $id = null;


	public function getId(): ?int
	{
		return $this->id;
	}


	public function setId(int $id)
	{
		$this->id = $id;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'id' => $this->getId(),
		);
	}
}
