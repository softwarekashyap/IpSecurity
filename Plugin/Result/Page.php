<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_IpSecurity
*/

namespace Kashyap\IpSecurity\Plugin\Result;

use Magento\Framework\App\ResponseInterface;

class Page
{
    private $context;

    public function __construct(
    	\Kashyap\IpSecurity\Helper\Data $ipHelper,
        \Magento\Framework\App\Request\Http $request,
        \Magento\Cms\Model\Page $page,
        \Magento\Framework\View\Element\Context $context
    ) {
        $this->context = $context;
        $this->ipHelper = $ipHelper;
        $this->request = $request;
        $this->_page = $page;
    }

    public function beforeRenderResult(
        \Magento\Framework\View\Result\Page $subject,
        ResponseInterface $response
    ) {
        if($this->ipHelper->getIsActive()) {
         	$moduleName = $this->request->getModuleName();
    		$redirectPage = $this->ipHelper->getRedirectPage();
    		$userIp = $this->ipHelper->getRemoteIpAddress();

    		
    		if($this->ipHelper->getRedirectBlank() && in_array($userIp, $this->ipHelper->getBlockIpArray())){
    			die('<h2 style="font-size: 14px;">HTTP Error 404 - File or Directory not found</h2>');
    		}

    		$pageIdentifire = $this->ipHelper->getRedirectPage();
    		if(!$this->ipHelper->getRedirectBlank() && in_array($userIp, $this->ipHelper->getBlockIpArray()) && $this->_page->getIdentifier() != $pageIdentifire && $moduleName != 'catalogsearch'){
    			$url = $this->ipHelper->getBaseUrl() . $this->ipHelper->getRedirectPage();
    			header('Location:'.$url ); die;
    		} 
        }
    }
}
