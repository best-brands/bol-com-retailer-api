<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|array getSignatureKeys()
 */
final class KeySetResponse extends AModel
{
    /** @var KeySet[] */
    protected array $signatureKeys = [];

    /**
     * @param KeySet[] $signatureKeys
     *
     * @return $this
     */
    public function setSignatureKeys(array $signatureKeys): self
    {
        $this->_checkIfPureArray($signatureKeys, KeySet::class);
        $this->signatureKeys = $signatureKeys;
        return $this;
    }
}
