<?php
/**
 * Copyright © element119. All rights reserved.
 * See LICENCE.txt for licence details.
 */
declare(strict_types=1);

namespace Element119\CmsIdentifierMarkup\Plugin;

use Element119\CmsIdentifierMarkup\Scope\Config;
use Magento\Cms\Api\BlockRepositoryInterface;
use Magento\Cms\Api\Data\BlockInterface;

class AddCmsBlockIdentifierToMarkup
{
    /** @var Config */
    private Config $moduleConfig;

    /**
     * @param Config $moduleConfig
     */
    public function __construct(
        Config $moduleConfig
    ) {
        $this->moduleConfig = $moduleConfig;
    }

    /**
     * Add HTML data-block-identifier attribute to wrapping element of CMS blocks.
     *
     * @param BlockRepositoryInterface $subject
     * @param BlockInterface $block
     * @return BlockInterface[]
     */
    public function beforeSave(
        BlockRepositoryInterface $subject,
        BlockInterface $block
    ): array {
        if ($this->moduleConfig->isBlockIdentifierMarkupEnabled()
            && ($identifier = $block->getIdentifier())
            && ($content = $block->getContent())
        ) {
            $block->setContent(
                substr_replace(
                    $content,
                    ' data-' . $this->moduleConfig->getBlockIdentifierDataAttributeName() . '="' . $identifier . '"',
                    strpos($content, '<div') + 4,
                    0
                )
            );
        }

        return [$block];
    }
}
