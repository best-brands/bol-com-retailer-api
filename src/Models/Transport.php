<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Transport extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * The transport id.
	 * @var int
	 */
	private ?int $transportId = null;

	/**
	 * Specify the transporter that will carry out the shipment.
	 * @var string
	 */
	private ?string $transporterCode = null;

	/**
	 * The track and trace code that is associated with this transport.
	 * @var string
	 */
	private ?string $trackAndTrace = null;

	/**
	 * Warning: This field is deprecated. See API release notes for more information.
	 * @var int
	 */
	private ?int $shippingLabelId = null;

	/**
	 * A unique code referring to the used shipping label for this shipment.
	 * @var string
	 */
	private ?string $shippingLabelCode = null;


	public function getTransportId(): ?int
	{
		return $this->transportId;
	}


	public function setTransportId(int $transportId)
	{
		$this->transportId = $transportId;
		return $this;
	}


	public function getTransporterCode(): ?string
	{
		return $this->transporterCode;
	}


	public function setTransporterCode(string $transporterCode)
	{
		$this->transporterCode = $transporterCode;
		return $this;
	}


	public function getTrackAndTrace(): ?string
	{
		return $this->trackAndTrace;
	}


	public function setTrackAndTrace(string $trackAndTrace)
	{
		$this->trackAndTrace = $trackAndTrace;
		return $this;
	}


	public function getShippingLabelId(): ?int
	{
		return $this->shippingLabelId;
	}


	public function setShippingLabelId(int $shippingLabelId)
	{
		$this->shippingLabelId = $shippingLabelId;
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
			'transportId' => $this->getTransportId(),
			'transporterCode' => $this->getTransporterCode(),
			'trackAndTrace' => $this->getTrackAndTrace(),
			'shippingLabelId' => $this->getShippingLabelId(),
			'shippingLabelCode' => $this->getShippingLabelCode(),
		);
	}
}
