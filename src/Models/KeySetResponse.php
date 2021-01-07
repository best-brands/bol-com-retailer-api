<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method KeySet[] getSignatureKeys()
 */
final class KeySetResponse extends \HarmSmits\BolComClient\Models\AModel
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
		$this->_checkIfPureArray($signatureKeys, \HarmSmits\BolComClient\Models\KeySet::class);
		$this->signatureKeys = $signatureKeys;
		return $this;
	}
}
