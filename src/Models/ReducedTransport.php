<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class ReducedTransport extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The transport id.
	 * @var int
	 */
	private ?int $transportId = null;


	public function getTransportId(): ?int
	{
		return $this->transportId;
	}


	public function setTransportId(int $transportId)
	{
		$this->transportId = $transportId;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'transportId' => $this->getTransportId(),
		);
	}
}
