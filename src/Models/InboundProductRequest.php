<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|int getAnnouncedQuantity()
 * @method self setAnnouncedQuantity(int $announcedQuantity)
 */
final class InboundProductRequest extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * The number of announced items.
	 * @var int
	 */
	protected ?int $announcedQuantity = null;
}
