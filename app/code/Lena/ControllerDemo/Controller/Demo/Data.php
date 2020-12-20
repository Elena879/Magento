<?php
declare(strict_types=1);

namespace Lena\ControllerDemo\Controller\Demo;

use Magento\Framework\View\Result\Page as PageResponse;

class Data implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory $pageResponseFactory
     */
    private $pageResponseFactory;

    /**
     * Controller constructor.
     * @param \Magento\Framework\View\Result\PageFactory $pageResponseFactory
     */
    public function __construct(
        \Magento\Framework\View\Result\PageFactory $pageResponseFactory
    )
    {
        $this->pageResponseFactory = $pageResponseFactory;
    }

    /**
     * https://elena-zabolotnaya-dev.local/routing/demo/data
     * Page file name: lena_controller_demo_demo_data.xml
     *
     * @return PageResponse
     */
    public function execute(): PageResponse
    {

        return $this->pageResponseFactory->create();
    }
}
