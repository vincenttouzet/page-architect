<?php

/*
 * This file is part of the PageArchitect package.
 *
 * (c) Vincent Touzet <vincent.touzet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saf\PageArchitect\Theme;

use Saf\PageArchitect\Block;

abstract class AbstractTheme implements ThemeInterface
{
    /** @var BlockTypeThemeInterface[] */
    protected $blockTypeThemes = [];

    /**
     * Prepare the block to be rendered
     *
     * @param Block $block
     */
    public function preProcess(Block $block)
    {
        foreach ($this->blockTypeThemes as $blockTypeTheme) {
            if ($blockTypeTheme->renders($block->getType())) {
                $blockTypeTheme->preProcess($block);
            }
        }
    }

    public function addBlockTypeTheme(BlockTypeThemeInterface $blockTypeTheme)
    {
        $this->blockTypeThemes[] = $blockTypeTheme;
    }
}
