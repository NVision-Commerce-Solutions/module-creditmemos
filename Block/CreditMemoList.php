<?php
namespace Commerce365\CreditMemos\Block;

use Commerce365\Core\Block\AbstractList;
use Commerce365\Core\Service\GetSalesDocuments;
use Commerce365\Core\Service\SalesDocumentInterface;
use Magento\Framework\View\Element\Template\Context;

class CreditMemoList extends AbstractList
{
    protected const URL = 'creditmemos/creditmemolist';
    protected const VIEW_URL = 'creditmemos/creditmemodetails';

    private GetSalesDocuments $getSalesDocuments;

    public function __construct(
        Context $context,
        GetSalesDocuments $getSalesDocuments,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->getSalesDocuments = $getSalesDocuments;
    }

    public function getCreditMemos()
    {
        $query = $this->processQuery([
            'tableNo' => SalesDocumentInterface::CREDITMEMO_TABLE_NO,
            'documentType' => 0
        ]);

        return $this->getSalesDocuments->execute($query);
    }
}
