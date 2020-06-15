<?php

/**
 * @author Kashyap Team
 * @copyright Copyright (c) 2018 Kashyap (http://kashyapsoftware.com/)
 * @package Kashyap_IpSecurity
*/

declare(strict_types=1);

namespace Kashyap\IpSecurity\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface
    */
    protected $scopeConfig;

    /**
    * Recipient email config path
    */
    const IP_ACTIVE           = 'ip_secutity/general/active';
    const IP_BLOCK_IP           = 'ip_secutity/general/block_ip';
    const IP_REDIRECT_BLANK     = 'ip_secutity/general/redirect_blank';
    const IP_REDIRECT_PAGE      = 'ip_secutity/general/redirect_page';

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\HTTP\PhpEnvironment\RemoteAddress $remoteAddress,
        \Magento\Store\Model\StoreManagerInterface $storeManagerInterface,
        \Magento\Framework\App\Helper\Context $context
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->remoteAddress = $remoteAddress;
        $this->storeManagerInterface = $storeManagerInterface;
        parent::__construct($context);
    }

    public function getBlockIp()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::IP_BLOCK_IP, $storeScope);
    }

    public function getRedirectBlank()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::IP_REDIRECT_BLANK, $storeScope);
    }

    public function getRedirectPage()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::IP_REDIRECT_PAGE, $storeScope);
    }

    public function getIsActive()
    {
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        return $this->scopeConfig->getValue(self::IP_ACTIVE, $storeScope);
    }

    public function getBlockIpArray()
    {
        return array_map('trim', explode('|', $this->getBlockIp()));
    }

    public function getRemoteIpAddress()
    {
        return $this->remoteAddress->getRemoteAddress();
    }

    public function getBaseUrl()
    {
        return $this->storeManagerInterface->getStore()->getBaseUrl();
    }
}

