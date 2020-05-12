<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class MonetaryItem extends \HarmSmits\BolComClient\Objects\AObject
{
    private ?float $amount = null;


    private ?string $currencyID = null;


    public function getAmount(): ?float
    {
        return $this->amount;
    }


    public function setAmount(float $amount)
    {
        $this->amount = $amount;
        return $this;
    }


    public function getCurrencyID(): ?string
    {
        return $this->currencyID;
    }


    public function setCurrencyID(string $currencyID)
    {
        $this->currencyID = $currencyID;
        return $this;
    }


    public function toArray(): array
    {
        return array(
            'amount' => $this->getAmount(),
            'currencyID' => $this->getCurrencyID(),
        );
    }
}
