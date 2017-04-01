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
use Saf\PageArchitect\Block\Type\BlockTypeInterface;

interface BlockTypeThemeInterface
{
    /**
     * Pre-process a block
     *
     * @param Block $block
     *
     * @return mixed
     */
    public function preProcess(Block $block);

    /**
     * Whether this block type theme is in charge of pre-processing the given block type.
     *
     * @param BlockTypeInterface $blockType
     *
     * @return bool
     */
    public function renders(BlockTypeInterface $blockType);
}
