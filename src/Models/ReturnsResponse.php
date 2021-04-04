<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method ReducedReturn[] getReturns()
 */
final class ReturnsResponse extends AModel
{
    /** @var ReducedReturn[] */
    protected array $returns = [];

    /**
     * @param ReducedReturn[] $returns
     *
     * @return $this
     */
    public function setReturns(array $returns): self
    {
        $this->_checkIfPureArray($returns, ReducedReturn::class);
        $this->returns = $returns;
        return $this;
    }
}
