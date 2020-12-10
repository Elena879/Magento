<?php
declare(strict_types=1);

namespace Lena\ControllerDemo\Block;

class Demo extends \Magento\Framework\View\Element\Template
{
    /**
     * @return string
     */
    public function getFirstNameParameter(): string
    {
        return (string)$this->getRequest()->getParam('first_name');
    }

    public function getLastNameParameter(): string
    {
        return (string)$this->getRequest()->getParam('last_name');
    }

    public function getRepositoryParameter(): string
    {
        return (string)$this->getRequest()->getParam('repository');
    }
}
