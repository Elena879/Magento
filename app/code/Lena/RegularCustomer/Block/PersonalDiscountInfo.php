<?php

declare(strict_types=1);

namespace Lena\RegularCustomer\Block;

use Lena\RegularCustomer\Model\DiscountRequest;
use Lena\RegularCustomer\Model\ResourceModel\DiscountRequest\Collection as DiscountRequestCollection;
use Magento\Framework\Phrase;

class PersonalDiscountInfo extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest\CollectionFactory $collectionFactorys
     */
    private $collectionFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    private $storeManager;

    /**
     * PersonalDiscountInfo constructor.
     * @param \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest\CollectionFactory $collectionFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest\CollectionFactory $collectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->collectionFactory = $collectionFactory;
        $this->storeManager = $storeManager;
    }

    /**
     * @return DiscountRequest|null
     */
    public function getPersonalDiscount(): ?DiscountRequest
    {
        /** @var DiscountRequestCollection $collection */
        $collection = $this->collectionFactory->create();
        // @TODO: get current customer's ID
        $collection->addFieldToFilter('email', 'john-doe@example.com');
        // @TODO: check if accounts are shared or not
        $collection->addFieldToFilter('website_id', $this->storeManager->getStore()->getWebsiteId());
        /** @var DiscountRequest $discountRequest */
        $discountRequest = $collection->getFirstItem();

        return $discountRequest->getDiscountRequestId() ? $discountRequest : null;
    }

    /**
     * @param DiscountRequest $discountRequest
     * @return Phrase
     */
    public function getStatusMessage(DiscountRequest $discountRequest): Phrase
    {
        switch ($discountRequest->getStatus()) {
            case DiscountRequest::STATUS_PENDING:
                return __('pending');
            case DiscountRequest::STATUS_APPROVED:
                return __('approved');
            case DiscountRequest::STATUS_DECLINED:
            default:
                return __('declined');
        }
    }
}
