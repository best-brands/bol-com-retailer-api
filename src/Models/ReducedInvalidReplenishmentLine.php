<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getType()
 */
final class ReducedInvalidReplenishmentLine extends AModel
{
	const TYPE_UNKNOWN_FBB_PRODUCT = 'UNKNOWN_FBB_PRODUCT';
	const TYPE_UNKNOWN_EAN_INVENTORY_RELATION = 'UNKNOWN_EAN_INVENTORY_RELATION';

	/**
	 * Type of invalid replenishment line, in case the BSKU and/or EAN cannot be
	 * determined for this replenishment line.
	 * @var string
	 */
	protected string $type;

	public function setType(string $type): self
	{
		$this->_checkEnumBounds($type, [
			"UNKNOWN_FBB_PRODUCT",
			"UNKNOWN_EAN_INVENTORY_RELATION"
		]);
		$this->type = $type;
		return $this;
	}
}
