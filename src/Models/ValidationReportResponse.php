<?php

namespace HarmSmits\BolComClient\Models;

/**
 * @method ProductContentResponse[] getProductContents()
 */
final class ValidationReportResponse extends AModel
{
    /** @var ProductContentResponse[] */
    protected array $productContents = [];

    /**
     * @param ProductContentResponse[] $productContents
     *
     * @return $this
     */
    public function setProductContents(array $productContents): self
    {
        $this->_checkIfPureArray($productContents, ProductContentResponse::class);
        $this->productContents = $productContents;
        return $this;
    }
}
