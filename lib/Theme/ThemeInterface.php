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

interface ThemeInterface
{
    /**
     * Prepare the block to be rendered
     *
     * @param Block $block
     */
    public function preProcess(Block $block);
}
