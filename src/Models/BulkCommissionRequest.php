<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class BulkCommissionRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	/** @var BulkCommissionQuery[] */
	private array $commissionQueries = [];


	public function getCommissionQueries(): ?array
	{
		return $this->commissionQueries;
	}


	public function setCommissionQueries(array $commissionQueries)
	{
		$this->_checkIfPureArray($commissionQueries, \HarmSmits\BolComClient\Models\BulkCommissionQuery::class);
		$this->_checkArrayBounds($commissionQueries, 0, 100);
		$this->commissionQueries = $commissionQueries;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'commissionQueries' => $this->_convertPureArray($this->getCommissionQueries()),
		);
	}
}
