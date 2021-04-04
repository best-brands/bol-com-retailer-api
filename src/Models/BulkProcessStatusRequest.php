<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|ProcessStatusId[] getProcessStatusQueries()
 */
final class BulkProcessStatusRequest extends AModel
{
    /** @var ProcessStatusId[] */
    protected array $processStatusQueries = [];

    /**
     * @param ProcessStatusId[] $processStatusQueries
     *
     * @return $this
     */
    public function setProcessStatusQueries(array $processStatusQueries): self
    {
        $this->_checkIfPureArray($processStatusQueries, ProcessStatusId::class);
        $this->_checkArrayBounds($processStatusQueries, 1, 1000);
        $this->processStatusQueries = $processStatusQueries;
        return $this;
    }
}
