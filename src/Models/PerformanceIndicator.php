<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getName()
 * @method null|string getType()
 * @method null|Details getDetails()
 * @method self setDetails(Details $details)
 */
final class PerformanceIndicator extends \HarmSmits\BolComClient\Models\AModel
{
	const NAME_CANCELLATIONS = 'CANCELLATIONS';
	const NAME_FULFILMENT = 'FULFILMENT';
	const NAME_PHONE_AVAILABILITY = 'PHONE_AVAILABILITY';
	const NAME_RESPONSE_TIME = 'RESPONSE_TIME';
	const NAME_CASE_ITEM_RATIO = 'CASE_ITEM_RATIO';
	const NAME_TRACK_AND_TRACE = 'TRACK_AND_TRACE';
	const NAME_RETURNS = 'RETURNS';
	const NAME_REVIEWS = 'REVIEWS';
	const TYPE_PERCENTAGE = 'PERCENTAGE';
	const TYPE_AVERAGE = 'AVERAGE';

	/**
	 * Indicator name.
	 * @var string
	 */
	protected ?string $name = null;

	/**
	 * Interpretation of the data that applies to this measurement.
	 * @var string
	 */
	protected ?string $type = null;

	/** Details of the indicator. */
	protected ?Details $details = null;


	public function setName(string $name): self
	{
		$this->_checkEnumBounds($name, [
			"CANCELLATIONS",
			"FULFILMENT",
			"PHONE_AVAILABILITY",
			"RESPONSE_TIME",
			"CASE_ITEM_RATIO",
			"TRACK_AND_TRACE",
			"RETURNS",
			"REVIEWS"
		]);
		$this->name = $name;
		return $this;
	}


	public function setType(string $type): self
	{
		$this->_checkEnumBounds($type, [
			"PERCENTAGE",
			"AVERAGE"
		]);
		$this->type = $type;
		return $this;
	}
}
