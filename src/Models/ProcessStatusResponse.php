<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method ProcessStatus[] getProcessStatuses()
 */
final class ProcessStatusResponse extends AModel
{
    /** @var ProcessStatus[] */
    protected array $processStatuses = [];

    /**
     * @param ProcessStatus[] $processStatuses
     *
     * @return $this
     */
    public function setProcessStatuses(array $processStatuses): self
    {
        $this->_checkIfPureArray($processStatuses, ProcessStatus::class);
        $this->processStatuses = $processStatuses;
        return $this;
    }
}
