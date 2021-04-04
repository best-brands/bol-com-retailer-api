<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getName()
 * @method self setName(string $name)
 * @method null|string getType()
 * @method self setType(string $type)
 * @method null|Total getTotal()
 * @method self setTotal(Total $total)
 * @method Countries[] getCountries()
 * @method SalesForecastPeriod[] getPeriods()
 */
final class SalesForecastResponse extends AModel
{
    /**
     * Indicator name.
     * @var string
     */
    protected string $name;

    /**
     * Interpretation of the data that applies to this measurement.
     * @var string
     */
    protected string $type;

    protected Total $total;

    /** @var Countries[] */
    protected array $countries = [];

    /** @var SalesForecastPeriod[] */
    protected array $periods = [];

    /**
     * @param Countries[] $countries
     *
     * @return $this
     */
    public function setCountries(array $countries): self
    {
        $this->_checkIfPureArray($countries, Countries::class);
        $this->countries = $countries;
        return $this;
    }

    /**
     * @param SalesForecastPeriod[] $periods
     *
     * @return $this
     */
    public function setPeriods(array $periods): self
    {
        $this->_checkIfPureArray($periods, SalesForecastPeriod::class);
        $this->periods = $periods;
        return $this;
    }
}
