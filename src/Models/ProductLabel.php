<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ProductLabel extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The EAN number associated with this product.
	 * @var string
	 */
	private string $ean;

	/**
	 * Number of products to generate labels for.
	 * @var int
	 */
	private int $quantity;


	public function getEan(): ?string
	{
		return $this->ean;
	}


	public function setEan(string $ean)
	{
		$this->ean = $ean;
		return $this;
	}


	public function getQuantity(): ?int
	{
		return $this->quantity;
	}


	public function setQuantity(int $quantity)
	{
		$this->quantity = $quantity;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'ean' => $this->getEan(),
			'quantity' => $this->getQuantity(),
		);
	}
}
