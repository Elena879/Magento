<?php
declare(strict_types=1);

namespace Lena\ControllerDemo\Controller\Demo;

use Magento\Framework\Controller\Result\Forward as forwardResponse;

class Forward implements \Magento\Framework\App\Action\HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\App\RequestInterface $request
     */
    private $request;
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory $forwardResponseFactory
     */
    private $forwardResponseFactory;

    /**
     * Controller constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \Magento\Framework\Controller\Result\ForwardFactory $forwardResponseFactory
     */
    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardResponseFactory
    ) {
        $this->request = $request;
        $this->forwardResponseFactory = $forwardResponseFactory;
    }

    /**
     * @return forwardResponse
     */
    public function execute(): forwardResponse
    {
        $forwardResponse = $this->forwardResponseFactory->create();
        return $forwardResponse->setParams([
                'id'=>1,
                'first_name' => 'Elena',
                'last_name' => 'Zabolotnaya',
                'repository' => 'https://github.com/Elena879/Magento'
        ])
            ->forward('data');
    }
}
