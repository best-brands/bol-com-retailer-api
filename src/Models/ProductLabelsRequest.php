<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getFormat()
 * @method ProductLabel[] getProductLabels()
 */
final class ProductLabelsRequest extends \HarmSmits\BolComClient\Models\AModel
{
	const FORMAT_AVERY_J8159 = 'AVERY_J8159';
	const FORMAT_AVERY_J8160 = 'AVERY_J8160';
	const FORMAT_AVERY_3474 = 'AVERY_3474';
	const FORMAT_DYMO_99012 = 'DYMO_99012';
	const FORMAT_BROTHER_DK11208D = 'BROTHER_DK11208D';
	const FORMAT_ZEBRA_Z_PERFORM_1000T = 'ZEBRA_Z_PERFORM_1000T';

	/**
	 * The printer format to create labels for.
	 * @var string
	 */
	protected ?string $format = null;

	/** @var ProductLabel[] */
	protected array $productLabels = [];


	public function setFormat(string $format): self
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


    /**
     * @param ProductLabel[] $productLabels
     *
     * @return $this
     */
	public function setProductLabels(array $productLabels): self
	{
		$this->_checkIfPureArray($productLabels, \HarmSmits\BolComClient\Models\ProductLabel::class);
		$this->_checkArrayBounds($productLabels, 1, 2147483647);
		$this->productLabels = $productLabels;
		return $this;
	}
}
