<?php

/*
 * This file is part of the PageArchitect package.
 *
 * (c) Vincent Touzet <vincent.touzet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saf\PageArchitect;

use Saf\PageArchitect\Block\Type\BlockTypeInterface;

interface BlockFactoryInterface
{
    /**
     * Creates a block.
     *
     * @param string                    $name
     * @param string|BlockTypeInterface $type
     * @param array                     $options
     *
     * @return BlockInterface
     */
    public function createBlock($name, $type, array $options = []);
}
