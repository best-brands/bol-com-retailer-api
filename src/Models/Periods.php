<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|Period getPeriod()
 * @method self setPeriod(Period $period)
 * @method null|float getTotal()
 * @method self setTotal(float $total)
 * @method Country[] getCountries()
 */
final class Periods extends \HarmSmits\BolComClient\Models\AModel
{
	protected Period $period;

	/**
	 * Total number of customer visits on the product page when the offer had the buy
	 * box over the requested period (excluding the current day).
	 * @var float
	 */
	protected ?float $total = null;

	/** @var Country[] */
	protected array $countries = [];


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
}
