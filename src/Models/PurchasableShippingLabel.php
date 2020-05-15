<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class PurchasableShippingLabel extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * A code representing the transporter which is being used for transportation.
	 * @var string
	 */
	private ?string $transporterCode = null;

	/**
	 * The type of the label, representing the way an item is being transported.
	 * @var string
	 */
	private ?string $labelType = null;

	/**
	 * The weight of a package.
	 * @var string
	 */
	private ?string $maxWeight = null;

	/**
	 * The dimensions of a package.
	 * @var string
	 */
	private ?string $maxDimensions = null;

	/**
	 * The price the item has been sold for.
	 * @var float
	 */
	private ?float $retailerPrice = null;

	/**
	 * The price that is charged to the partner for the shipping label, including VAT.
	 * @var float
	 */
	private ?float $purchasePrice = null;

	/**
	 * The discount of the item that has been sold.
	 * @var float
	 */
	private ?float $discount = null;

	/**
	 * A unique code referring to the used shipping label for this shipment.
	 * @var string
	 */
	private ?string $shippingLabelCode = null;


	public function getTransporterCode(): ?string
	{
		return $this->transporterCode;
	}


	public function setTransporterCode(string $transporterCode)
	{
		$this->transporterCode = $transporterCode;
		return $this;
	}


	public function getLabelType(): ?string
	{
		return $this->labelType;
	}


	public function setLabelType(string $labelType)
	{
		$this->labelType = $labelType;
		return $this;
	}


	public function getMaxWeight(): ?string
	{
		return $this->maxWeight;
	}


	public function setMaxWeight(string $maxWeight)
	{
		$this->maxWeight = $maxWeight;
		return $this;
	}


	public function getMaxDimensions(): ?string
	{
		return $this->maxDimensions;
	}


	public function setMaxDimensions(string $maxDimensions)
	{
		$this->maxDimensions = $maxDimensions;
		return $this;
	}


	public function getRetailerPrice(): ?float
	{
		return round($this->retailerPrice, 2);
	}


	public function setRetailerPrice(float $retailerPrice)
	{
		$this->retailerPrice = $retailerPrice;
		return $this;
	}


	public function getPurchasePrice(): ?float
	{
		return round($this->purchasePrice, 2);
	}


	public function setPurchasePrice(float $purchasePrice)
	{
		$this->purchasePrice = $purchasePrice;
		return $this;
	}


	public function getDiscount(): ?float
	{
		return round($this->discount, 2);
	}


	public function setDiscount(float $discount)
	{
		$this->discount = $discount;
		return $this;
	}


	public function getShippingLabelCode(): ?string
	{
		return $this->shippingLabelCode;
	}


	public function setShippingLabelCode(string $shippingLabelCode)
	{
		$this->shippingLabelCode = $shippingLabelCode;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'transporterCode' => $this->getTransporterCode(),
			'labelType' => $this->getLabelType(),
			'maxWeight' => $this->getMaxWeight(),
			'maxDimensions' => $this->getMaxDimensions(),
			'retailerPrice' => $this->getRetailerPrice(),
			'purchasePrice' => $this->getPurchasePrice(),
			'discount' => $this->getDiscount(),
			'shippingLabelCode' => $this->getShippingLabelCode(),
		);
	}
}
