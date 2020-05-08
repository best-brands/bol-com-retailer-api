<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class TransportersResponse extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var Transporter[] */
	private array $fbbTransporters = [];


	public function getFbbTransporters(): ?array
	{
		return $this->fbbTransporters;
	}


	public function setFbbTransporters(array $fbbTransporters)
	{
		$this->_checkIfPureArray($fbbTransporters, \HarmSmits\BolComClient\Models\Transporter::class);
		$this->fbbTransporters = $fbbTransporters;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'fbbTransporters' => $this->_convertPureArray($this->getFbbTransporters()),
		);
	}
}
