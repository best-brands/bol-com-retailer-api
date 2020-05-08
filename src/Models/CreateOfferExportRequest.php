<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
