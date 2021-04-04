<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getLabelFormat()
 * @method ProductLabelsProduct[] getProducts()
 */
final class ProductLabelsRequest extends AModel
{
	const LABEL_FORMAT_AVERY_J8159 = 'AVERY_J8159';
	const LABEL_FORMAT_AVERY_J8160 = 'AVERY_J8160';
	const LABEL_FORMAT_AVERY_3474 = 'AVERY_3474';
	const LABEL_FORMAT_DYMO_99012 = 'DYMO_99012';
	const LABEL_FORMAT_BROTHER_DK11208D = 'BROTHER_DK11208D';
	const LABEL_FORMAT_ZEBRA_Z_PERFORM_1000T = 'ZEBRA_Z_PERFORM_1000T';

	/**
	 * The printer format to create labels for.
	 * @var string
	 */
	protected string $labelFormat;

	/** @var ProductLabelsProduct[] */
	protected array $products = [];

	public function setLabelFormat(string $labelFormat): self
	{
		$this->_checkEnumBounds($labelFormat, [
			"AVERY_J8159",
			"AVERY_J8160",
			"AVERY_3474",
			"DYMO_99012",
			"BROTHER_DK11208D",
			"ZEBRA_Z_PERFORM_1000T"
		]);
		$this->labelFormat = $labelFormat;
		return $this;
	}

    /**
     * @param ProductLabelsProduct[] $products
     *
     * @return $this
     */
	public function setProducts(array $products): self
	{
		$this->_checkIfPureArray($products, ProductLabelsProduct::class);
		$this->_checkArrayBounds($products, 1, 250);
		$this->products = $products;
		return $this;
	}
}
