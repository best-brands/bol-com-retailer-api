<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getShippingLabelOfferId()
 * @method self setShippingLabelOfferId(string $shippingLabelOfferId)
 * @method null|string getValidUntilDate()
 * @method self setValidUntilDate(string $validUntilDate)
 * @method null|string getTransporterCode()
 * @method self setTransporterCode(string $transporterCode)
 * @method null|string getLabelType()
 * @method null|LabelPrice getLabelPrice()
 * @method self setLabelPrice(LabelPrice $labelPrice)
 * @method null|PackageRestrictions getPackageRestrictions()
 * @method self setPackageRestrictions(PackageRestrictions $packageRestrictions)
 * @method null|HandoverDetails getHandoverDetails()
 * @method self setHandoverDetails(HandoverDetails $handoverDetails)
 */
final class DeliveryOption extends \HarmSmits\BolComClient\Models\AModel
{
	const LABEL_TYPE_PARCEL = 'PARCEL';
	const LABEL_TYPE_MAILBOX = 'MAILBOX';
	const LABEL_TYPE_MAILBOX_LIGHT = 'MAILBOX_LIGHT';

	/**
	 * Unique identifier for the shipping label offer.
	 * @var string
	 */
	protected ?string $shippingLabelOfferId = null;

	/**
	 * The date until the delivery option (incl total price) is valid.
	 * @var string
	 */
	protected ?string $validUntilDate = null;

	/**
	 * A code representing the transporter which is being used for transportation.
	 * @var string
	 */
	protected ?string $transporterCode = null;

	/**
	 * The type of the label, representing the way an item is being transported.
	 * @var string
	 */
	protected ?string $labelType = null;

	protected LabelPrice $labelPrice;

	protected PackageRestrictions $packageRestrictions;

	protected ?HandoverDetails $handoverDetails = null;


	public function setLabelType(string $labelType): self
	{
		$this->_checkEnumBounds($labelType, [
			"PARCEL",
			"MAILBOX",
			"MAILBOX_LIGHT"
		]);
		$this->labelType = $labelType;
		return $this;
	}
}
