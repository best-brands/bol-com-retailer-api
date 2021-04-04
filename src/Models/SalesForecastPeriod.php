<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|int getWeeksAhead()
 * @method self setWeeksAhead(int $weeksAhead)
 * @method null|Total getTotal()
 * @method self setTotal(Total $total)
 * @method Countries[] getCountries()
 */
final class SalesForecastPeriod extends AModel
{
    /**
     * The number of weeks into the future, starting from today.
     * @var int
     */
    protected int $weeksAhead = 0;

    protected Total $total;

    /** @var Countries[] */
    protected array $countries = [];

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
}
