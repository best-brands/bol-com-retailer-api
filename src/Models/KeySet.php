<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getId()
 * @method self setId(string $id)
 * @method null|string getType()
 * @method null|string getPublicKey()
 * @method self setPublicKey(string $publicKey)
 */
final class KeySet extends AModel
{
    const TYPE_RSA = 'RSA';

    /**
     * Key identifier. Maps to the keyId value in the signature header of the push request.
     * @var string
     */
    protected string $id;

    /**
     * Key encryption type.
     * @var string
     */
    protected string $type;

    /**
     * The Base64 encoded public key to use when verifying the signature.
     * @var string
     */
    protected string $publicKey;

    public function setType(string $type): self
    {
        $this->_checkEnumBounds($type, [
            "RSA",
        ]);
        $this->type = $type;
        return $this;
    }
}
