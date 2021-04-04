<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|OfferInsightsPeriod getPeriod()
 * @method self setPeriod(OfferInsightsPeriod $period)
 * @method null|float getTotal()
 * @method self setTotal(float $total)
 * @method OfferInsightsCountry[] getCountries()
 */
final class Periods extends AModel
{
    protected OfferInsightsPeriod $period;

    /**
     * Total number of customer visits on the product page when the offer had the buy box over the requested period
     * (excluding the current day).
     * @var float
     */
    protected ?float $total = null;

    /** @var OfferInsightsCountry[] */
    protected array $countries = [];

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
}
