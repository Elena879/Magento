<?php

declare(strict_types=1);

namespace Lena\RegularCustomer\Controller\Index;

use Magento\Framework\Controller\Result\Json as JsonResponse;
use Lena\RegularCustomer\Model\DiscountRequest;

class Request implements \Magento\Framework\App\Action\HttpPostActionInterface
{
    /**
     * @var \Magento\Framework\App\RequestInterface $request
     */
    private $request;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory $jsonResponseFactory
     */
    private $jsonResponseFactory;
    /**
     * @var \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest $discountRequestResource
     */
    private $discountRequestResource;
    /**
     * @var \Lena\RegularCustomer\Model\DiscountRequestFactory $discountRequestFactory
     */
    private $discountRequestFactory;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    private $storeManager;
    /**
     * @var \Psr\Log\LoggerInterface $logger
     */
    private $logger;

    /**
     * Controller constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonResponseFactory
     * @param \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest $discountRequestResource
     * @param \Lena\RegularCustomer\Model\DiscountRequestFactory $discountRequestFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Controller\Result\JsonFactory $jsonResponseFactory,
        \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest $discountRequestResource,
        \Lena\RegularCustomer\Model\DiscountRequestFactory $discountRequestFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->request = $request;
        $this->jsonResponseFactory = $jsonResponseFactory;
        $this->discountRequestResource = $discountRequestResource;
        $this->discountRequestFactory = $discountRequestFactory;
        $this->storeManager = $storeManager;
        $this->logger = $logger;
    }

    /**
     * https://elena-zabolotnaya-dev.local/lena_regular_customer/index/request
     *
     * @return JsonResponse
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function execute(): JsonResponse
    {
        $response = $this->jsonResponseFactory->create();

        // @TODO: pass message via notifications, not alert
        // @TODO: add form key validation and hideIt validation
        // @TODO: add Google Recaptcha to the form
        /** @var DiscountRequest $discountRequest */
        try {
            $discountRequest = $this->discountRequestFactory->create();
            $discountRequest->setName($this->request->getParam('name'))
                ->setEmail($this->request->getParam('email'))
                ->setWebsiteId($this->storeManager->getStore()->getWebsiteId())
                ->setStatus(DiscountRequest::STATUS_PENDING);
            $this->discountRequestResource->save($discountRequest);
            $message = __('You request for product %1 was accepted!', $this->request->getParam('productName'));
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $message = __('Your request can\'t be sent. Please, contact us if you see this message.');
        }
        return $response->setData([
            'message' => $message
        ]);
    }
}
