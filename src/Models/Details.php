<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method null|PerformanceIndicatorPeriod getPeriod()
 * @method self setPeriod(PerformanceIndicatorPeriod $period)
 * @method null|Score getScore()
 * @method self setScore(Score $score)
 * @method null|Norm getNorm()
 * @method self setNorm(Norm $norm)
 */
final class Details extends AModel
{
    /** The period for which the performance is measured. */
    protected PerformanceIndicatorPeriod $period;

    /**
     * The score for this measurement. In case there are no scores for an indicator, this element is omitted from the
     * response.
     */
    protected ?Score $score = null;

    /** Service norm for this indicator. */
    protected Norm $norm;
}
