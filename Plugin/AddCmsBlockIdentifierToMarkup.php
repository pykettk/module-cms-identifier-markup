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
            $firstWord = strtok($content, ' ');

            // if tags are removed from the first "word" and the values are not equal then we have HTML to edit
            if (strip_tags($firstWord) !== $firstWord) {
                $tag = explode('>', explode('<', $content)[1])[0]; // parsing HTML with PHP is gross

                $block->setContent(
                    substr_replace(
                        $content,
                        ' data-' . $this->moduleConfig->getBlockIdentifierDataAttributeName() . '="' . $identifier . '"',
                        strpos($content, $tag) + strlen($tag),
                        0
                    )
                );
            } else if ($this->moduleConfig->useHtmlComments()) {
                $block->setContent('<!-- CMS identifier = ' . $identifier . ' -->' . "\n" . $content);
            }
        }

        return [$block];
    }
}
