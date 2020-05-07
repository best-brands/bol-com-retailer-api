<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedTransport extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The transport id.
	 * @var int
	 */
	private ?int $transportId = null;


	public function getTransportId(): ?int
	{
		return $this->transportId;
	}


	public function setTransportId(int $transportId)
	{
		$this->transportId = $transportId;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'transportId' => $this->getTransportId(),
		);
	}
}
