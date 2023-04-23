<?php
/**
 * Copyright © element119. All rights reserved.
 * See LICENCE.txt for licence details.
 */
declare(strict_types=1);

namespace Element119\CmsIdentifierMarkup\Scope;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    const XML_PATH_CMS_IDENTIFIER_MARKUP_ENABLED = 'cms/pagebuilder/block_identifier_markup_enabled';
    const XML_PATH_CMS_IDENTIFIER_DATA_ATTR_NAME = 'cms/pagebuilder/block_identifier_attribute_name';
    const XML_PATH_CMS_IDENTIFIER_HTML_COMMENT = 'cms/pagebuilder/block_identifier_comment';

    /** @var ScopeConfigInterface */
    private ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param int|string|null $scopeCode
     * @return bool
     */
    public function isBlockIdentifierMarkupEnabled($scopeCode = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CMS_IDENTIFIER_MARKUP_ENABLED,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }

    /**
     * @param $scopeCode
     * @return string
     */
    public function getBlockIdentifierDataAttributeName($scopeCode = null): string
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_CMS_IDENTIFIER_DATA_ATTR_NAME,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }

    /**
     * @param int|string|null $scopeCode
     * @return bool
     */
    public function useHtmlComments($scopeCode = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_CMS_IDENTIFIER_HTML_COMMENT,
            ScopeInterface::SCOPE_STORE,
            $scopeCode
        );
    }
}
