<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getName()
 * @method self setName(string $name)
 * @method null|string getType()
 * @method self setType(string $type)
 * @method null|float getTotal()
 * @method self setTotal(float $total)
 * @method OfferInsightsCountry[] getCountries()
 * @method Periods[] getPeriods()
 */
final class OfferInsight extends AModel
{
    /**
     * The name of the requested offer insight.
     * @var string
     */
    protected string $name;

    /**
     * Interpretation of the data that applies to this measurement.
     * @var string
     */
    protected string $type;

    /**
     * Total number of customer visits on the product page when the offer had the buy
     * box over the requested period (excluding the current day).
     * @var float
     */
    protected ?float $total = null;

    /** @var OfferInsightsCountry[] */
    protected array $countries = [];

    /** @var Periods[] */
    protected array $periods = [];

    /**
     * @param OfferInsightsCountry[] $countries
     *
     * @return $this
     */
    public function setCountries(array $countries): self
    {
        $this->_checkIfPureArray($countries, OfferInsightsCountry::class);
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
        $this->_checkIfPureArray($periods, Periods::class);
        $this->periods = $periods;
        return $this;
    }
}
