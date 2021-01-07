<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method Transporter[] getTransporters()
 */
final class TransportersResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var Transporter[] */
	protected array $transporters = [];


    /**
     * @param Transporter[] $transporters
     *
     * @return $this
     */
	public function setTransporters(array $transporters): self
	{
		$this->_checkIfPureArray($transporters, \HarmSmits\BolComClient\Models\Transporter::class);
		$this->transporters = $transporters;
		return $this;
	}
}
