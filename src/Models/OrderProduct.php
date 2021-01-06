<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getTitle()
 * @method self setTitle(string $title)
 */
final class OrderProduct extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	protected ?string $ean = null;

	/**
	 * Title of the product as shown on the webshop.
	 * @var string
	 */
	protected ?string $title = null;
}
