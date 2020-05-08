<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ProcessStatusId extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The process status id.
	 * @var int
	 */
	private ?int $id = null;


	public function getId(): ?int
	{
		return $this->id;
	}


	public function setId(int $id)
	{
		$this->id = $id;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'id' => $this->getId(),
		);
	}
}
