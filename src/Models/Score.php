<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class Score extends \HarmSmits\BolComClient\Objects\AObject
{
	/**
	 * Indicates whether the score conforms to the bol.com service norm or not.
	 * @var bool
	 */
	private ?bool $conforms = null;

	/**
	 * The top part of the fraction (above the line). This usually is the smaller
	 * number compared to the denominator.
	 * @var int
	 */
	private ?int $numerator = null;

	/**
	 * The lower part of the fraction (below the line). This usually is the larger
	 * number compared to the the numerator.
	 * @var int
	 */
	private ?int $denominator = null;

	/**
	 * The score for this measurement (denominator divided by the numerator).
	 * @var int
	 */
	private ?int $value = null;

	/**
	 * The difference between the score and the bol.com service norm.
	 * @var int
	 */
	private ?int $distanceToNorm = null;


	public function getConforms(): ?bool
	{
		return $this->conforms;
	}


	public function setConforms(bool $conforms)
	{
		$this->conforms = $conforms;
		return $this;
	}


	public function getNumerator(): ?int
	{
		return $this->numerator;
	}


	public function setNumerator(int $numerator)
	{
		$this->numerator = $numerator;
		return $this;
	}


	public function getDenominator(): ?int
	{
		return $this->denominator;
	}


	public function setDenominator(int $denominator)
	{
		$this->denominator = $denominator;
		return $this;
	}


	public function getValue(): ?int
	{
		return $this->value;
	}


	public function setValue(int $value)
	{
		$this->value = $value;
		return $this;
	}


	public function getDistanceToNorm(): ?int
	{
		return $this->distanceToNorm;
	}


	public function setDistanceToNorm(int $distanceToNorm)
	{
		$this->distanceToNorm = $distanceToNorm;
		return $this;
	}


	public function toArray(): array
	{
		return array(
			'conforms' => $this->getConforms(),
			'numerator' => $this->getNumerator(),
			'denominator' => $this->getDenominator(),
			'value' => $this->getValue(),
			'distanceToNorm' => $this->getDistanceToNorm(),
		);
	}
}
