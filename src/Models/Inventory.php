<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getBsku()
 * @method self setBsku(string $bsku)
 * @method null|int getGradedStock()
 * @method self setGradedStock(int $gradedStock)
 * @method null|int getRegularStock()
 * @method self setRegularStock(int $regularStock)
 * @method null|string getTitle()
 * @method self setTitle(string $title)
 */
final class Inventory extends \HarmSmits\BolComClient\Models\AModel
{
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
	 * The stock that is not available for sale anymore.
	 * @var int
	 */
	protected ?int $gradedStock = null;

	/**
	 * The stock that is available for sale.
	 * @var int
	 */
	protected ?int $regularStock = null;

	/**
	 * The product title.
	 * @var string
	 */
	protected ?string $title = null;
}
