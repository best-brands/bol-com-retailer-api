<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class TransportersResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var Transporter[] */
	private array $fbbTransporters = [];


	public function getFbbTransporters(): ?array
	{
		return $this->fbbTransporters;
	}


	public function setFbbTransporters(array $fbbTransporters)
	{
		$this->_checkIfPureArray($fbbTransporters, \HarmSmits\BolComClient\Models\Transporter::class);
		$this->fbbTransporters = $fbbTransporters;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'fbbTransporters' => $this->_convertPureArray($this->getFbbTransporters()),
		);
	}
}
