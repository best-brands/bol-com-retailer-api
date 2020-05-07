<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Product extends \HarmSmits\BolComClient\Objects\AObject
{
	const STATE_Announced = 'Announced';
	const STATE_Unannounced = 'Unannounced';
	const STATE_Unknown = 'Unknown';

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private ?string $ean = null;

	/**
	 * The BSKU number associated with this product.
	 * @var string
	 */
	private ?string $bsku = null;

	/**
	 * The number of announced items.
	 * @var int
	 */
	private ?int $announcedQuantity = null;

	/**
	 * The number of received items.
	 * @var int
	 */
	private ?int $receivedQuantity = null;

	/**
	 * The current state of the inbound product.
	 * @var string
	 */
	private ?string $state = null;


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
		return $this;
	}


	public function getBsku(): ?string
	{
		return $this->bsku;
	}


	public function setBsku(string $bsku)
	{
		$this->bsku = $bsku;
		return $this;
	}


	public function getAnnouncedQuantity(): ?int
	{
		return $this->announcedQuantity;
	}


	public function setAnnouncedQuantity(int $announcedQuantity)
	{
		$this->announcedQuantity = $announcedQuantity;
		return $this;
	}


	public function getReceivedQuantity(): ?int
	{
		return $this->receivedQuantity;
	}


	public function setReceivedQuantity(int $receivedQuantity)
	{
		$this->receivedQuantity = $receivedQuantity;
		return $this;
	}


	public function getState(): ?string
	{
		return $this->state;
	}


	public function setState(string $state)
	{
		$this->_checkEnumBounds($state, [
			"Announced",
			"Unannounced",
			"Unknown"
		]);
		$this->state = $state;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'ean' => $this->getEan(),
			'bsku' => $this->getBsku(),
			'announcedQuantity' => $this->getAnnouncedQuantity(),
			'receivedQuantity' => $this->getReceivedQuantity(),
			'state' => $this->getState(),
		);
	}
}
