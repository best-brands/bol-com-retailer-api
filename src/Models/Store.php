<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Store extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The product title for the product associated with this offer.
	 * @var string
	 */
	private ?string $productTitle = null;

	/** @var CountryCode[] */
	private array $visible = [];


	public function getProductTitle(): ?string
	{
		return $this->productTitle;
	}


	public function setProductTitle(string $productTitle)
	{
		$this->productTitle = $productTitle;
		return $this;
	}


	public function getVisible(): ?array
	{
		return $this->visible;
	}


	public function setVisible(array $visible)
	{
		$this->_checkIfPureArray($visible, \HarmSmits\BolComClient\Models\CountryCode::class);
		$this->visible = $visible;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'productTitle' => $this->getProductTitle(),
			'visible' => $this->_convertPureArray($this->getVisible()),
		);
	}
}
