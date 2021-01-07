<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method ReducedInbound[] getInbounds()
 */
final class Inbounds extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * An inbound shipment.
	 * @var ReducedInbound[]
	 */
	protected array $inbounds = [];


    /**
     * @param ReducedInbound[] $inbounds
     *
     * @return $this
     */
	public function setInbounds(array $inbounds): self
	{
		$this->_checkIfPureArray($inbounds, \HarmSmits\BolComClient\Models\ReducedInbound::class);
		$this->inbounds = $inbounds;
		return $this;
	}
}
