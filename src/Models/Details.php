<?php

namespace HarmSmits\BolComClient\Models;

use \DateTime;

/**
 * @method null|Period getPeriod()
 * @method self setPeriod(Period $period)
 * @method null|Score getScore()
 * @method self setScore(Score $score)
 * @method null|Norm getNorm()
 * @method self setNorm(Norm $norm)
 */
final class Details extends \HarmSmits\BolComClient\Models\AModel
{
	/** The period for which the performance is measured. */
	protected ?Period $period = null;

	/**
	 * The score for this measurement. In case there are no scores for an indicator,
	 * this element is omitted from the response.
	 */
	protected ?Score $score = null;

	/** Service norm for this indicator. */
	protected ?Norm $norm = null;
}
