<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|BulkCommissionQuery[] getCommissionQueries()
 */
final class BulkCommissionRequest extends AModel
{
    /** @var BulkCommissionQuery[] */
    protected array $commissionQueries = [];

    /**
     * @param BulkCommissionQuery[] $commissionQueries
     *
     * @return $this
     */
    public function setCommissionQueries(array $commissionQueries): self
    {
        $this->_checkIfPureArray($commissionQueries, BulkCommissionQuery::class);
        $this->_checkArrayBounds($commissionQueries, 1, 20);
        $this->commissionQueries = $commissionQueries;
        return $this;
    }
}
