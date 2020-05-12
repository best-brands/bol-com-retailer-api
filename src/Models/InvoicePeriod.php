<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InvoicePeriod extends \HarmSmits\BolComClient\Objects\AObject
{
    /**
     * The start date
     * @var string
     */
    private ?string $startDate = null;

    /**
     * The end date
     * @var string
     */
    private ?string $endDate = null;


    public function getStartDate(): ?string
    {
        return $this->startDate;
    }


    public function setStartDate(string $startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }


    public function getEndDate(): ?string
    {
        return $this->endDate;
    }


    public function setEndDate(string $endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }


    public function toArray(): array
    {
        return array(
            'startDate' => $this->getStartDate(),
            'endDate' => $this->getEndDate(),
        );
    }
}
