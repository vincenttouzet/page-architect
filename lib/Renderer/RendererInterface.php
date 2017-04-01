<?php

/*
 * This file is part of the PageArchitect package.
 *
 * (c) Vincent Touzet <vincent.touzet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saf\PageArchitect\Renderer;

use Saf\PageArchitect\Block;

interface RendererInterface
{
    /**
     * @param Block $block
     * @return mixed
     */
    public function render(Block $block);
}
