<?php

declare(strict_types=1);

namespace  Lena\RegularCustomer\Model\ResourceModel\DiscountRequest;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @inheritDoc
     */
    protected function _construct(): void
    {
        parent::_construct();
        $this->_init(
            \Lena\RegularCustomer\Model\DiscountRequest::class,
            \Lena\RegularCustomer\Model\ResourceModel\DiscountRequest::class
        );
    }
}
