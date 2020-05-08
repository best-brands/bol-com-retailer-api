<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BulkProcessStatusRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var ProcessStatusId[] */
	private array $processStatusQueries = [];


	public function getProcessStatusQueries(): ?array
	{
		return $this->processStatusQueries;
	}


	public function setProcessStatusQueries(array $processStatusQueries)
	{
		$this->_checkIfPureArray($processStatusQueries, \HarmSmits\BolComClient\Models\ProcessStatusId::class);
		$this->_checkArrayBounds($processStatusQueries, 1, 1000);
		$this->processStatusQueries = $processStatusQueries;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'processStatusQueries' => $this->_convertPureArray($this->getProcessStatusQueries()),
		);
	}
}
