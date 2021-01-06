<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getBsku()
 * @method self setBsku(string $bsku)
 * @method null|int getAnnouncedQuantity()
 * @method self setAnnouncedQuantity(int $announcedQuantity)
 * @method null|int getReceivedQuantity()
 * @method self setReceivedQuantity(int $receivedQuantity)
 * @method null|string getState()
 */
final class Product extends \HarmSmits\BolComClient\Models\AModel
{
	const STATE_ANNOUNCED = 'ANNOUNCED';
	const STATE_UNANNOUNCED = 'UNANNOUNCED';
	const STATE_UNKNOWN = 'UNKNOWN';

	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * The BSKU number associated with this product.
	 * @var string
	 */
	protected ?string $bsku = null;

	/**
	 * The number of announced items.
	 * @var int
	 */
	protected ?int $announcedQuantity = null;

	/**
	 * The number of received items.
	 * @var int
	 */
	protected ?int $receivedQuantity = null;

	/**
	 * The current state of the inbound product.
	 * @var string
	 */
	protected ?string $state = null;


	public function setState(string $state): self
	{
		$this->_checkEnumBounds($state, [
			"ANNOUNCED",
			"UNANNOUNCED",
			"UNKNOWN"
		]);
		$this->state = $state;
		return $this;
	}
}
