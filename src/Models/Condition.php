<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getName()
 * @method null|string getCategory()
 * @method null|string getComment()
 * @method self setComment(string $comment)
 */
final class Condition extends \HarmSmits\BolComClient\Models\AModel
{
	const NAME_NEW = 'NEW';
	const NAME_AS_NEW = 'AS_NEW';
	const NAME_GOOD = 'GOOD';
	const NAME_REASONABLE = 'REASONABLE';
	const NAME_MODERATE = 'MODERATE';
	const CATEGORY_NEW = 'NEW';
	const CATEGORY_SECONDHAND = 'SECONDHAND';

	/**
	 * The condition of the offered product.
	 * @var string
	 */
	protected string $name;

	/**
	 * The category of the condition. If not given NEW or SECONDHAND is derived from
	 * NAME.
	 * @var string
	 */
	protected ?string $category = null;

	/**
	 * The description of the condition of the product. Only allowed if name is not NEW
	 * and may not contain e-mail addresses.
	 * @var string
	 */
	protected ?string $comment = null;


	public function setName(string $name): self
	{
		$this->_checkEnumBounds($name, [
			"NEW",
			"AS_NEW",
			"GOOD",
			"REASONABLE",
			"MODERATE"
		]);
		$this->name = $name;
		return $this;
	}


	public function setCategory(string $category): self
	{
		$this->_checkEnumBounds($category, [
			"NEW",
			"SECONDHAND"
		]);
		$this->category = $category;
		return $this;
	}
}
