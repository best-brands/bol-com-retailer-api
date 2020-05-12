<?php
/**********************************************************************************************************************
 * Any components or design related choices are copyright protected under international law. They are proprietary     *
 * code from Harm Smits and shall not be obtained, used or distributed without explicit permission from Harm Smits.   *
 * I grant you a non-commercial license via github when you download the product. Commercial licenses can be obtained *
 * by contacting me. For any legal inquiries, please contact me at <harmsmitsdev@gmail.com>                           *
 **********************************************************************************************************************/

namespace HarmSmits\BolComClient\Models;

use \DateTime;

final class InvoicesResponse extends \HarmSmits\BolComClient\Objects\AObject
{
    private ?string $period = null;


    /** @var InvoiceListItem[] */
    private array $invoiceListItems = [];


    public function getPeriod(): ?string
    {
        return $this->period;
    }


    public function setPeriod(string $period)
    {
        $this->period = $period;
        return $this;
    }


    public function getInvoiceListItems(): ?array
    {
        return $this->invoiceListItems;
    }


    public function setInvoiceListItems(array $invoiceListItems)
    {
        $this->_checkIfPureArray($invoiceListItems, \HarmSmits\BolComClient\Models\InvoiceListItem::class);
        $this->invoiceListItems = $invoiceListItems;
        return $this;
    }


    public function toArray(): array
    {
        return array(
            'commissions' => $this->_convertPureArray($this->getInvoiceListItems()),
        );
    }
}
