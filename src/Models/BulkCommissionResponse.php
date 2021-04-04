<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method Commission[] getCommissions()
 */
final class BulkCommissionResponse extends AModel
{
    /** @var Commission[] */
    protected array $commissions = [];

    /**
     * @param Commission[] $commissions
     *
     * @return $this
     */
    public function setCommissions(array $commissions): self
    {
        $this->_checkIfPureArray($commissions, Commission::class);
        $this->commissions = $commissions;
        return $this;
    }
}
