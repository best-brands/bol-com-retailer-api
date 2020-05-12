<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InvoiceMonetary extends \HarmSmits\BolComClient\Objects\AObject
{
    private ?MonetaryItem $lineExtensionAmount = null;


    private ?MonetaryItem $payableAmount = null;


    private ?MonetaryItem $taxExclusiveAmount = null;


    private ?MonetaryItem $taxInclusiveAmount = null;


    public function getLineExtensionAmount(): ?MonetaryItem
    {
        return $this->lineExtensionAmount;
    }


    public function setLineExtensionAmount(MonetaryItem $lineExtensionAmount)
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }


    public function getPayableAmount(): ?MonetaryItem
    {
        return $this->payableAmount;
    }


    public function setPayableAmount(MonetaryItem $payableAmount)
    {
        $this->payableAmount = $payableAmount;
        return $this;
    }


    public function getTaxExclusiveAmount(): ?MonetaryItem
    {
        return $this->taxExclusiveAmount;
    }


    public function setTaxExclusiveAmount(MonetaryItem $taxExclusiveAmount)
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;
        return $this;
    }


    public function getTaxInclusiveAmount(): ?MonetaryItem
    {
        return $this->taxInclusiveAmount;
    }


    public function setTaxInclusiveAmount(MonetaryItem $taxInclusiveAmount)
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        return $this;
    }

    
    public function toArray(): array
    {
        return array(
            'lineExtensionAmount' => $this->getLineExtensionAmount()->toArray(),
            'payableAmount' => $this->getPayableAmount()->toArray(),
            'taxExclusiveAmount' => $this->getTaxExclusiveAmount()->toArray(),
            'taxInclusiveAmount' => $this->getTaxInclusiveAmount()->toArray()
        );
    }
}
