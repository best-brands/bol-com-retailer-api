<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

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
