<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InvoiceListItem extends \HarmSmits\BolComClient\Objects\AObject
{
    /**
     * The timeslot start date and time in ISO 8601 format.
     * @var string
     */
    private ?string $invoiceId = null;


    private int $issueDate = 0;


    private ?InvoicePeriod $invoicePeriod = null;

    /**
     * The type of invoice.
     * @var string
     */
    private ?string $invoiceType = null;


    private ?InvoiceMonetary $legalMonetaryTotal = null;
    
    
    private ?MediaTypes $invoiceMediaTypes = null;
    
    
    private ?MediaTypes $specificationMediaTypes = null;


    private float $openAmount = 0;


    public function getInvoiceId(): ?string
    {
        return $this->invoiceId;
    }


    public function setInvoiceId(string $invoiceId)
    {
        $this->invoiceId = $invoiceId;
        return $this;
    }


    public function getIssueDate(): ?int
    {
        return $this->issueDate;
    }


    public function setIssueDate(int $issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }


    public function getInvoicePeriod(): ?InvoicePeriod
    {
        return $this->invoicePeriod;
    }


    public function setInvoicePeriod(?InvoicePeriod $invoicePeriod)
    {
        $this->invoicePeriod = $invoicePeriod;
        return $this;
    }


    public function getInvoiceType(): ?string
    {
        return $this->invoiceType;
    }


    public function setInvoiceType(string $invoiceType)
    {
        $this->invoiceType = $invoiceType;
        return $this;
    }


    public function getLegalMonetaryTotal(): ?InvoiceMonetary
    {
        return $this->legalMonetaryTotal;
    }


    public function setLegalMonetaryTotal(?InvoiceMOnetary $legalMonetaryTotal)
    {
        $this->legalMonetaryTotal = $legalMonetaryTotal;
        return $this;
    }
    
    
    public function getInvoiceMediaTypes(): ?MediaTypes
    {
        return $this->invoiceMediaTypes;
    }
    
    
    public function setInvoiceMediaTypes(MediaTypes $mediaTypes)
    {
        $this->invoiceMediaTypes = $mediaTypes;
        return $this;
    }


    public function getSpecificationMediaTypes(): ?MediaTypes
    {
        return $this->specificationMediaTypes;
    }


    public function setSpecificationMediaTypes(MediaTypes $mediaTypes)
    {
        $this->specificationMediaTypes = $mediaTypes;
        return $this;
    }


    public function getOpenAmount(): ?float
    {
        return round($this->openAmount, 2);
    }


    public function setOpenAmount(float $openAmount)
    {
        $this->openAmount = $openAmount;
        return $this;
    }
    

    public function toArray(): array
    {
        return array(
            'invoiceId' => $this->getInvoiceId(),
            'issueDate' => $this->getIssueDate(),
            'invoicePeriod' => $this->getInvoicePeriod()->toArray(),
            'invoiceType' => $this->getInvoiceType(),
            'legalMonetaryTotal' => $this->getLegalMonetaryTotal()->toArray(),
            'invoiceMediaTypes' => $this->getInvoiceMediaTypes()->toArray(),
            'specificationMediaTypes' => $this->getSpecificationMediaTypes()->toArray(),
            'openAmount' => $this->getOpenAmount()
        );
    }
}
