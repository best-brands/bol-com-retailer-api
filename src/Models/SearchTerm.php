<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getSearchTerm()
 * @method self setSearchTerm(string $searchTerm)
 * @method null|string getType()
 * @method self setType(string $type)
 * @method null|int getTotal()
 * @method self setTotal(int $total)
 * @method SearchTermsCountry[] getCountries()
 * @method TotalPeriod[] getPeriods()
 * @method RelatedSearchTerm[] getRelatedSearchTerms()
 */
final class SearchTerm extends AModel
{
    /**
     * The search term for which you requested the search volume.
     * @var string
     */
    protected string $searchTerm;

    /**
     * Interpretation of the data that applies to this measurement.
     * @var string
     */
    protected string $type;

    /**
     * The number of customer visits on the search page.
     * @var int
     */
    protected int $total;

    /** @var SearchTermsCountry[] */
    protected array $countries = [];

    /** @var TotalPeriod[] */
    protected array $periods = [];

    /** @var RelatedSearchTerm[] */
    protected array $relatedSearchTerms = [];

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

    /**
     * @param TotalPeriod[] $periods
     *
     * @return $this
     */
    public function setPeriods(array $periods): self
    {
        $this->_checkIfPureArray($periods, TotalPeriod::class);
        $this->periods = $periods;
        return $this;
    }

    /**
     * @param RelatedSearchTerm[] $relatedSearchTerms
     *
     * @return $this
     */
    public function setRelatedSearchTerms(array $relatedSearchTerms): self
    {
        $this->_checkIfPureArray($relatedSearchTerms, RelatedSearchTerm::class);
        $this->relatedSearchTerms = $relatedSearchTerms;
        return $this;
    }
}
