<?php
namespace Commerce365\CreditMemos\Controller\CreditMemoList;
use Magento\Framework\App\Action\Context;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    protected $session;

    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,\Magento\Customer\Model\Session $customerSession)
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->session = $customerSession;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->session->isLoggedIn()) {
            /** @var \Magento\Framework\Controller\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('customer/account/login');
            return $resultRedirect;
        }

        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}

