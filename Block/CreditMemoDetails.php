<?php

namespace Commerce365\CreditMemos\Block;

use Commerce365\Core\Service\GetSalesDocument;
use Commerce365\Core\Service\SalesDocumentInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class CreditMemoDetails extends Template
{
    private GetSalesDocument $getSalesDocument;

    public function __construct(
        Context $context,
        GetSalesDocument $getSalesDocuments,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->getSalesDocument = $getSalesDocuments;
    }

    public function getCreditMemo()
    {
        $query = [
            'tableNo' => SalesDocumentInterface::CREDITMEMO_TABLE_NO,
            'documentType' => 0,
            'id' => $this->getRequest()->getParam('id')
        ];

        return $this->getSalesDocument->execute($query);
    }

    public function safeGet(array $array, string $key, $default = '')
    {
        return $array[$key] ?? $default;
    }
}
