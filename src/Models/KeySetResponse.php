<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|array getSignatureKeys()
 */
final class KeySetResponse extends \HarmSmits\BolComClient\Models\AModel
{
	/** @var KeySet[] */
	protected array $signatureKeys = [];


	public function setSignatureKeys(array $signatureKeys): self
	{
		$this->_checkIfPureArray($signatureKeys, \HarmSmits\BolComClient\Models\KeySet::class);
		$this->signatureKeys = $signatureKeys;
		return $this;
	}
}
