<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class TransportInstruction extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Specify the transporter that will carry out the shipment.
	 * @var string
	 */
	private ?string $transporterCode = null;

	/**
	 * The track and trace code that is associated with this transport.
	 * @var string
	 */
	private ?string $trackAndTrace = null;


	public function getTransporterCode(): ?string
	{
		return $this->transporterCode;
	}


	public function setTransporterCode(string $transporterCode)
	{
		$this->transporterCode = $transporterCode;
		return $this;
	}


	public function getTrackAndTrace(): ?string
	{
		return $this->trackAndTrace;
	}


	public function setTrackAndTrace(string $trackAndTrace)
	{
		$this->trackAndTrace = $trackAndTrace;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'transporterCode' => $this->getTransporterCode(),
			'trackAndTrace' => $this->getTrackAndTrace(),
		);
	}
}
