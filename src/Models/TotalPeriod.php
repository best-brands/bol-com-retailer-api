<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|SearchTermsPeriod getPeriod()
 * @method self setPeriod(SearchTermsPeriod $period)
 * @method null|int getTotal()
 * @method self setTotal(int $total)
 * @method SearchTermsCountry[] getCountries()
 */
final class TotalPeriod extends AModel
{
    protected SearchTermsPeriod $period;

    /**
     * The number of customer visits on the search page.
     * @var int
     */
    protected int $total;

    /** @var SearchTermsCountry[] */
    protected array $countries = [];

    /**
     * @param SearchTermsCountry[] $countries
     *
     * @return $this
     */
    public function setCountries(array $countries): self
    {
        $this->_checkIfPureArray($countries, SearchTermsCountry::class);
        $this->countries = $countries;
        return $this;
    }
}
