<?php

namespace HarmSmits\BolComClient\Models;

use DateTime;

/**
 * @method null|bool getMeetsCustomerExpectation()
 * @method self setMeetsCustomerExpectation(bool $meetsCustomerExpectation)
 * @method null|DateTime getLatestHandoverDateTime()
 * @method null|string getCollectionMethod()
 */
final class HandoverDetails extends AModel
{
    const COLLECTION_METHOD_DROP_OFF = 'DROP_OFF';
    const COLLECTION_METHOD_PICK_UP = 'PICK_UP';

    /**
     * Indicates if you can use this label without receiving a strike if you handover before the
     * latestHandoverDateTime. If this field is 'false' you can still buy and use this label but it will have
     * negative consequences on your performance score because the order will be delivered too early or too late.
     * @var bool
     */
    protected ?bool $meetsCustomerExpectation = null;

    /**
     * The date and time at which the parcel must ultimately be at the transporter to make sure your parcel is
     * delivered on time. If you handover after this date you will receive a strike because you order will be
     * delivered too late.
     * @var DateTime
     */
    protected ?DateTime $latestHandoverDateTime = null;

    /**
     * The type of collection for this parcel.
     * @var string
     */
    protected ?string $collectionMethod = null;

    /**
     * @param DateTime|string|int $latestHandoverDateTime
     *
     * @return $this
     */
    public function setLatestHandoverDateTime($latestHandoverDateTime): self
    {
        $latestHandoverDateTime       = $this->_parseDate($latestHandoverDateTime);
        $this->latestHandoverDateTime = $latestHandoverDateTime;
        return $this;
    }

    public function setCollectionMethod(string $collectionMethod): self
    {
        $this->_checkEnumBounds($collectionMethod, [
            "DROP_OFF",
            "PICK_UP",
        ]);
        $this->collectionMethod = $collectionMethod;
        return $this;
    }
}
