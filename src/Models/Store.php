<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getProductTitle()
 * @method self setProductTitle(string $productTitle)
 * @method null|array getVisible()
 */
final class Store extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The product title for the product associated with this offer.
	 * @var string
	 */
	protected ?string $productTitle = null;

	/** @var CountryCode[] */
	protected array $visible = [];


	public function setVisible(array $visible): self
	{
		$this->_checkIfPureArray($visible, \HarmSmits\BolComClient\Models\CountryCode::class);
		$this->visible = $visible;
		return $this;
	}
}
