<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InventoryOffer extends \HarmSmits\BolComClient\Objects\AObject
{
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
	 * The stock that is not available for sale anymore (unsaleable)
	 * @var int
	 */
	private ?int $nckStock = null;

	/**
	 * The stock that is available for sale (saleable).
	 * @var int
	 */
	private ?int $stock = null;

	/**
	 * The product title.
	 * @var string
	 */
	private ?string $title = null;


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


	public function getNckStock(): ?int
	{
		return $this->nckStock;
	}


	public function setNckStock(int $nckStock)
	{
		$this->nckStock = $nckStock;
		return $this;
	}


	public function getStock(): ?int
	{
		return $this->stock;
	}


	public function setStock(int $stock)
	{
		$this->stock = $stock;
		return $this;
	}


	public function getTitle(): ?string
	{
		return $this->title;
	}


	public function setTitle(string $title)
	{
		$this->title = $title;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'ean' => $this->getEan(),
			'bsku' => $this->getBsku(),
			'nckStock' => $this->getNckStock(),
			'stock' => $this->getStock(),
			'title' => $this->getTitle(),
		);
	}
}
