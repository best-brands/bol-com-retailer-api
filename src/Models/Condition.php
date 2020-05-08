<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Condition extends \HarmSmits\BolComClient\Objects\AObject
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
	private string $name;

	/**
	 * The category of the condition. If not given NEW or SECONDHAND is derived from
	 * NAME.
	 * @var string
	 */
	private ?string $category = null;

	/**
	 * The description of the condition of the product. Only allowed if name is not NEW
	 * and may not contain e-mail addresses.
	 * @var string
	 */
	private ?string $comment = null;


	public function getName(): ?string
	{
		return $this->name;
	}


	public function setName(string $name)
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


	public function getCategory(): ?string
	{
		return $this->category;
	}


	public function setCategory(string $category)
	{
		$this->_checkEnumBounds($category, [
			"NEW",
			"SECONDHAND"
		]);
		$this->category = $category;
		return $this;
	}


	public function getComment(): ?string
	{
		return $this->comment;
	}


	public function setComment(string $comment)
	{
		$this->comment = $comment;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'name' => $this->getName(),
			'category' => $this->getCategory(),
			'comment' => $this->getComment(),
		);
	}
}
