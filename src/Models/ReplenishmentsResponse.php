<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method ReducedReplenishment[] getReplenishments()
 */
final class ReplenishmentsResponse extends AModel
{
    /** @var ReducedReplenishment[] */
    protected array $replenishments = [];

    /**
     * @param ReducedReplenishment[] $replenishments
     *
     * @return $this
     */
    public function setReplenishments(array $replenishments): self
    {
        $this->_checkIfPureArray($replenishments, ReducedReplenishment::class);
        $this->replenishments = $replenishments;
        return $this;
    }
}
