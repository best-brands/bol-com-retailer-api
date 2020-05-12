<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class PerformanceIndicator extends \HarmSmits\BolComClient\Objects\AObject
{
    const NAME_CANCELLATIONS = "CANCELLATIONS";
    const NAME_FULFILMENT = "FULFILMENT";
    const NAME_PHONE_AVAILABILITY = "PHONE_AVAILABILITY";
    const NAME_RESPONSE_TIME = "RESPONSE_TIME";
    const NAME_CASE_ITEM_RATIO = "CASE_ITEM_RATIO";
    const NAME_TRACK_AND_TRACE = "TRACK_AND_TRACE";
    const NAME_RETURNS = "RETURNS";
    const NAME_REVIEWS = "REVIEWS";

	/**
	 * Indicator name.
	 * @var string
	 */
	private ?string $name = null;

	/**
	 * Interpretation of the data that applies to this measurement.
	 * @var string
	 */
	private ?string $type = null;

	/** Details of the indicator. */
	private ?Details $details = null;


	public function getName(): ?string
	{
		return $this->name;
	}


	public function setName(string $name)
	{
		$this->name = $name;
		return $this;
	}


	public function getType(): ?string
	{
		return $this->type;
	}


	public function setType(string $type)
	{
		$this->type = $type;
		return $this;
	}


	public function getDetails(): ?Details
	{
		return $this->details;
	}


	public function setDetails(Details $details)
	{
		$this->details = $details;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'name' => $this->getName(),
			'type' => $this->getType(),
			'details' => $this->getDetails(),
		);
	}
}
