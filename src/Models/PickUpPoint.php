<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getCode()
 */
final class PickUpPoint extends \HarmSmits\BolComClient\Models\AModel
{
	const CODE_PUP_AH_NL = 'PUP_AH_NL';

	/** @var string */
	protected ?string $code = null;


	public function setCode(string $code): self
	{
		$this->_checkEnumBounds($code, [
			"PUP_AH_NL"
		]);
		$this->code = $code;
		return $this;
	}
}
