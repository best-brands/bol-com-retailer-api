<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InboundProductRequest extends \HarmSmits\BolComClient\Objects\AObject
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
	 * Warning: This field is deprecated. Any value given will be overrided with the
	 * bsku known by bol.com.
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
