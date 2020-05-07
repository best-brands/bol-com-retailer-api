<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ProductLabelsRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	const FORMAT_AVERY_J8159 = 'AVERY_J8159';
	const FORMAT_AVERY_J8160 = 'AVERY_J8160';
	const FORMAT_AVERY_3474 = 'AVERY_3474';
	const FORMAT_DYMO_99012 = 'DYMO_99012';
	const FORMAT_BROTHER_DK11208D = 'BROTHER_DK11208D';
	const FORMAT_ZEBRA_Z_PERFORM_1000T = 'ZEBRA_Z_PERFORM_1000T';

	/**
	 * The printer format to create labels for, defaults to AVERY_J8159 if not
	 * provided.
	 * @var string
	 */
	private ?string $format = null;

	/** @var ProductLabel[] */
	private array $productLabels = [];


	public function getFormat(): ?string
	{
		return $this->format;
	}


	public function setFormat(string $format)
	{
		$this->_checkEnumBounds($format, [
			"AVERY_J8159",
			"AVERY_J8160",
			"AVERY_3474",
			"DYMO_99012",
			"BROTHER_DK11208D",
			"ZEBRA_Z_PERFORM_1000T"
		]);
		$this->format = $format;
		return $this;
	}


	public function getProductLabels(): ?array
	{
		return $this->productLabels;
	}


	public function setProductLabels(array $productLabels)
	{
		$this->_checkIfPureArray($productLabels, \HarmSmits\BolComClient\Models\ProductLabel::class);
		$this->_checkArrayBounds($productLabels, 1, 2147483647);
		$this->productLabels = $productLabels;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'format' => $this->getFormat(),
			'productLabels' => $this->_convertPureArray($this->getProductLabels()),
		);
	}
}
