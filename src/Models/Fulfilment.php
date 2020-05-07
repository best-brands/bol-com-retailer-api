<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Fulfilment extends \HarmSmits\BolComClient\Objects\AObject
{
	const TYPE_FBB = 'FBB';
	const TYPE_FBR = 'FBR';
	const DELIVERY_CODE_24uurs_23 = '24uurs-23';
	const DELIVERY_CODE_24uurs_22 = '24uurs-22';
	const DELIVERY_CODE_24uurs_21 = '24uurs-21';
	const DELIVERY_CODE_24uurs_20 = '24uurs-20';
	const DELIVERY_CODE_24uurs_19 = '24uurs-19';
	const DELIVERY_CODE_24uurs_18 = '24uurs-18';
	const DELIVERY_CODE_24uurs_17 = '24uurs-17';
	const DELIVERY_CODE_24uurs_16 = '24uurs-16';
	const DELIVERY_CODE_24uurs_15 = '24uurs-15';
	const DELIVERY_CODE_24uurs_14 = '24uurs-14';
	const DELIVERY_CODE_24uurs_13 = '24uurs-13';
	const DELIVERY_CODE_24uurs_12 = '24uurs-12';
	const DELIVERY_CODE_1_2d = '1-2d';
	const DELIVERY_CODE_2_3d = '2-3d';
	const DELIVERY_CODE_3_5d = '3-5d';
	const DELIVERY_CODE_4_8d = '4-8d';
	const DELIVERY_CODE_1_8d = '1-8d';
	const DELIVERY_CODE_MijnLeverbelofte = 'MijnLeverbelofte';

	/**
	 * Specifies whether this shipment has been fulfilled by the retailer (FBR) or
	 * fulfilled by bol.com (FBB). Defaults to FBR.
	 * @var string
	 */
	private ?string $type = null;

	/**
	 * The delivery promise that applies to this offer.
	 * @var string
	 */
	private ?string $deliveryCode = null;

	/**
	 * List of Pick Up Points codes enabled for this offer.
	 * @var PickUpPoint[]
	 */
	private array $pickUpPoints = [];


	public function getType(): ?string
	{
		return $this->type;
	}


	public function setType(string $type)
	{
		$this->_checkEnumBounds($type, [
			"FBB",
			"FBR"
		]);
		$this->type = $type;
		return $this;
	}


	public function getDeliveryCode(): ?string
	{
		return $this->deliveryCode;
	}


	public function setDeliveryCode(string $deliveryCode)
	{
		$this->_checkEnumBounds($deliveryCode, [
			"24uurs-23",
			"24uurs-22",
			"24uurs-21",
			"24uurs-20",
			"24uurs-19",
			"24uurs-18",
			"24uurs-17",
			"24uurs-16",
			"24uurs-15",
			"24uurs-14",
			"24uurs-13",
			"24uurs-12",
			"1-2d",
			"2-3d",
			"3-5d",
			"4-8d",
			"1-8d",
			"MijnLeverbelofte"
		]);
		$this->deliveryCode = $deliveryCode;
		return $this;
	}


	public function getPickUpPoints(): ?array
	{
		return $this->pickUpPoints;
	}


	public function setPickUpPoints(array $pickUpPoints)
	{
		$this->_checkIfPureArray($pickUpPoints, \HarmSmits\BolComClient\Models\PickUpPoint::class);
		$this->pickUpPoints = $pickUpPoints;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'type' => $this->getType(),
			'deliveryCode' => $this->getDeliveryCode(),
			'pickUpPoints' => $this->_convertPureArray($this->getPickUpPoints()),
		);
	}
}
