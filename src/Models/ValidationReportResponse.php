<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method ProductContentResponse[] getProductContents()
 */
final class ValidationReportResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var ProductContentResponse[] */
	protected array $productContents = [];


    /**
     * @param ProductContentResponse[] $productContents
     *
     * @return $this
     */
	public function setProductContents(array $productContents): self
	{
		$this->_checkIfPureArray($productContents, \HarmSmits\BolComClient\Models\ProductContentResponse::class);
		$this->productContents = $productContents;
		return $this;
	}
}
