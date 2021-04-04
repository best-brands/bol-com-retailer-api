<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getType()
 * @method null|int getQuantityAnnounced()
 * @method self setQuantityAnnounced(int $quantityAnnounced)
 * @method null|int getQuantityReceived()
 * @method self setQuantityReceived(int $quantityReceived)
 * @method null|int getQuantityInProgress()
 * @method self setQuantityInProgress(int $quantityInProgress)
 * @method null|int getQuantityWithGradedState()
 * @method self setQuantityWithGradedState(int $quantityWithGradedState)
 * @method null|int getQuantityWithRegularState()
 * @method self setQuantityWithRegularState(int $quantityWithRegularState)
 */
final class InvalidReplenishmentLine extends AModel
{
    const TYPE_UNKNOWN_FBB_PRODUCT = 'UNKNOWN_FBB_PRODUCT';
    const TYPE_UNKNOWN_EAN_INVENTORY_RELATION = 'UNKNOWN_EAN_INVENTORY_RELATION';

    /**
     * Type of invalid replenishment line, in case the BSKU and/or EAN cannot be
     * determined for this replenishment line.
     * @var string
     */
    protected string $type;

    /**
     * The amount of announced quantity for this replenishment line.
     * @var int
     */
    protected int $quantityAnnounced;

    /**
     * The amount of received quantity for this replenishment line.
     * @var int
     */
    protected int $quantityReceived;

    /**
     * The amount of quantity that is still in progress at the warehouse for this replenishment line.
     * @var int
     */
    protected int $quantityInProgress;

    /**
     * The quantity within this shipment line that has a graded (unsalable) state.
     * @var int
     */
    protected int $quantityWithGradedState;

    /**
     * The quantity within this shipment line that has a regular (salable) state.
     * @var int
     */
    protected int $quantityWithRegularState;

    public function setType(string $type): self
    {
        $this->_checkEnumBounds($type, [
            "UNKNOWN_FBB_PRODUCT",
            "UNKNOWN_EAN_INVENTORY_RELATION",
        ]);
        $this->type = $type;
        return $this;
    }
}
