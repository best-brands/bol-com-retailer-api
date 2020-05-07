<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class CreateOfferExportRequest extends \HarmSmits\BolComClient\Objects\AObject
{
	const FORMAT_CSV = 'CSV';

	/**
	 * The file format in which to return the export.
	 * @var string
	 */
	private string $format;


	public function getFormat(): ?string
	{
		return $this->format;
	}


	public function setFormat(string $format)
	{
		$this->_checkEnumBounds($format, [
			"CSV"
		]);
		$this->format = $format;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'format' => $this->getFormat(),
		);
	}
}
