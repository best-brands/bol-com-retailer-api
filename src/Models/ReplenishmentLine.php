<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|string getEan()
 * @method self setEan(string $ean)
 * @method null|string getLineState()
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
final class ReplenishmentLine extends AModel
{
    const LINE_STATE_ANNOUNCED = 'ANNOUNCED';
    const LINE_STATE_UNANNOUNCED = 'UNANNOUNCED';
    const LINE_STATE_UNKNOWN = 'UNKNOWN';

    /**
     * The EAN number associated with this product.
     * @var string
     */
    protected string $ean;

    /**
     * The state of the line indicating whether this line was announced within this replenishment.
     * @var string
     */
    protected string $lineState;

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

    public function setLineState(string $lineState): self
    {
        $this->_checkEnumBounds($lineState, [
            "ANNOUNCED",
            "UNANNOUNCED",
            "UNKNOWN",
        ]);
        $this->lineState = $lineState;
        return $this;
    }
}
