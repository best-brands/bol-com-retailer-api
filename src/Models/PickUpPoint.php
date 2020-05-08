<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class PickUpPoint extends \HarmSmits\BolComClient\Objects\AObject
{
	const CODE_PUP_AH_NL = 'PUP_AH_NL';

	/**
	 * The code of the pickup point location in case you want to ship items to pickup
	 * points.
	 * @var string
	 */
	private ?string $code = null;


	public function getCode(): ?string
	{
		return $this->code;
	}


	public function setCode(string $code)
	{
		$this->_checkEnumBounds($code, [
			"PUP_AH_NL"
		]);
		$this->code = $code;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'code' => $this->getCode(),
		);
	}
}
