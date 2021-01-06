<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|int getQuantity()
 * @method self setQuantity(int $quantity)
 */
final class ProductLabel extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected string $ean;

	/**
	 * Number of products to generate labels for.
	 * @var int
	 */
	protected int $quantity;
}
