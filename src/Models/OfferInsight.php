<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getName()
 * @method self setName(string $name)
 * @method null|string getType()
 * @method self setType(string $type)
 * @method null|float getTotal()
 * @method self setTotal(float $total)
 * @method Country[] getCountries()
 * @method Periods[] getPeriods()
 */
final class OfferInsight extends \HarmSmits\BolComClient\Models\AModel
{
	/**
	 * The name of the requested offer insight.
	 * @var string
	 */
	protected ?string $name = null;

	/**
	 * Interpretation of the data that applies to this measurement.
	 * @var string
	 */
	protected ?string $type = null;

	/**
	 * Total number of customer visits on the product page when the offer had the buy
	 * box over the requested period (excluding the current day).
	 * @var float
	 */
	protected ?float $total = null;

	/** @var Country[] */
	protected array $countries = [];

	/** @var Periods[] */
	protected array $periods = [];


    /**
     * @param Country[] $countries
     *
     * @return $this
     */
	public function setCountries(array $countries): self
	{
		$this->_checkIfPureArray($countries, \HarmSmits\BolComClient\Models\Country::class);
		$this->countries = $countries;
		return $this;
	}


    /**
     * @param Periods[] $periods
     *
     * @return $this
     */
	public function setPeriods(array $periods): self
	{
		$this->_checkIfPureArray($periods, \HarmSmits\BolComClient\Models\Periods::class);
		$this->periods = $periods;
		return $this;
	}
}
