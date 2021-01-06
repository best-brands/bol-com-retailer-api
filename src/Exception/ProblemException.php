<?php

namespace HarmSmits\BolComClient\Exception;

use HarmSmits\BolComClient\Models\Problem;
use Throwable;

class ProblemException extends BolComException
{
    protected Problem $problem;

    public function __construct(Problem $problem)
    {
        parent::__construct("A problem has occurred");
        $this->problem = $problem;
    }

    public function getProblem() {
        return $this->problem;
    }
}
