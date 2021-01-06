<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getLanguage()
 * @method null|array getProductContents()
 */
final class CreateProductContentRequest extends \HarmSmits\BolComClient\Models\AModel
{
	const LANGUAGE_nl = 'nl';
	const LANGUAGE_nl_BE = 'nl-BE';
	const LANGUAGE_fr = 'fr';
	const LANGUAGE_fr_BE = 'fr-BE';

	/**
	 * The language to indicate the language of the supplied content.
	 * @var string
	 */
	protected string $language;

	/**
	 * A list of supplied products and their attributes. Attributes that are required
	 * for publishing products online will be mentioned in the data model.
	 * @var ProductContent[]
	 */
	protected array $productContents = [];


	public function setLanguage(string $language): self
	{
		$this->_checkEnumBounds($language, [
			"nl",
			"nl-BE",
			"fr",
			"fr-BE"
		]);
		$this->language = $language;
		return $this;
	}


	public function setProductContents(array $productContents): self
	{
		$this->_checkIfPureArray($productContents, \HarmSmits\BolComClient\Models\ProductContent::class);
		$this->_checkArrayBounds($productContents, 1, 100);
		$this->productContents = $productContents;
		return $this;
	}
}
