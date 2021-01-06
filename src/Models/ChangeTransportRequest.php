<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|string getTransporterCode()
 * @method null|string getTrackAndTrace()
 * @method self setTrackAndTrace(string $trackAndTrace)
 */
final class ChangeTransportRequest extends \HarmSmits\BolComClient\Models\AModel
{
	const TRANSPORTER_CODE_BRIEFPOST = 'BRIEFPOST';
	const TRANSPORTER_CODE_UPS = 'UPS';
	const TRANSPORTER_CODE_TNT = 'TNT';
	const TRANSPORTER_CODE_TNT_EXTRA = 'TNT-EXTRA';
	const TRANSPORTER_CODE_TNT_BRIEF = 'TNT_BRIEF';
	const TRANSPORTER_CODE_TNT_EXPRESS = 'TNT-EXPRESS';
	const TRANSPORTER_CODE_DYL = 'DYL';
	const TRANSPORTER_CODE_DPD_NL = 'DPD-NL';
	const TRANSPORTER_CODE_DPD_BE = 'DPD-BE';
	const TRANSPORTER_CODE_BPOST_BE = 'BPOST_BE';
	const TRANSPORTER_CODE_BPOST_BRIEF = 'BPOST_BRIEF';
	const TRANSPORTER_CODE_DHLFORYOU = 'DHLFORYOU';
	const TRANSPORTER_CODE_GLS = 'GLS';
	const TRANSPORTER_CODE_FEDEX_NL = 'FEDEX_NL';
	const TRANSPORTER_CODE_FEDEX_BE = 'FEDEX_BE';
	const TRANSPORTER_CODE_OTHER = 'OTHER';
	const TRANSPORTER_CODE_DHL = 'DHL';
	const TRANSPORTER_CODE_DHL_DE = 'DHL_DE';
	const TRANSPORTER_CODE_DHL_GLOBAL_MAIL = 'DHL-GLOBAL-MAIL';
	const TRANSPORTER_CODE_TSN = 'TSN';
	const TRANSPORTER_CODE_FIEGE = 'FIEGE';
	const TRANSPORTER_CODE_TRANSMISSION = 'TRANSMISSION';
	const TRANSPORTER_CODE_PARCEL_NL = 'PARCEL-NL';
	const TRANSPORTER_CODE_LOGOIX = 'LOGOIX';
	const TRANSPORTER_CODE_PACKS = 'PACKS';
	const TRANSPORTER_CODE_COURIER = 'COURIER';
	const TRANSPORTER_CODE_RJP = 'RJP';

	/** @var string */
	protected ?string $transporterCode = null;

	/**
	 * The track and trace code that is associated with this transport.
	 * @var string
	 */
	protected ?string $trackAndTrace = null;


	public function setTransporterCode(string $transporterCode): self
	{
		$this->_checkEnumBounds($transporterCode, [
			"BRIEFPOST",
			"UPS",
			"TNT",
			"TNT-EXTRA",
			"TNT_BRIEF",
			"TNT-EXPRESS",
			"DYL",
			"DPD-NL",
			"DPD-BE",
			"BPOST_BE",
			"BPOST_BRIEF",
			"DHLFORYOU",
			"GLS",
			"FEDEX_NL",
			"FEDEX_BE",
			"OTHER",
			"DHL",
			"DHL_DE",
			"DHL-GLOBAL-MAIL",
			"TSN",
			"FIEGE",
			"TRANSMISSION",
			"PARCEL-NL",
			"LOGOIX",
			"PACKS",
			"COURIER",
			"RJP"
		]);
		$this->transporterCode = $transporterCode;
		return $this;
	}
}
