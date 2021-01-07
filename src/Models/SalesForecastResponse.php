<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getName()
 * @method self setName(string $name)
 * @method null|string getType()
 * @method self setType(string $type)
 * @method null|Total getTotal()
 * @method self setTotal(Total $total)
 * @method Countries[] getCountries()
 * @method Period[] getPeriods()
 */
final class SalesForecastResponse extends \HarmSmits\BolComClient\Models\AModel
{
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

	protected Total $total;

	/** @var Countries[] */
	protected array $countries = [];

	/** @var Period[] */
	protected array $periods = [];


    /**
     * @param Countries[] $countries
     *
     * @return $this
     */
	public function setCountries(array $countries): self
	{
		$this->_checkIfPureArray($countries, \HarmSmits\BolComClient\Models\Countries::class);
		$this->countries = $countries;
		return $this;
	}


    /**
     * @param Period[] $periods
     *
     * @return $this
     */
	public function setPeriods(array $periods): self
	{
		$this->_checkIfPureArray($periods, \HarmSmits\BolComClient\Models\Period::class);
		$this->periods = $periods;
		return $this;
	}
}
