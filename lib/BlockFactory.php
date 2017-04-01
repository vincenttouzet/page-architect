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

class BlockFactory implements BlockFactoryInterface
{
    /**
     * @var BlockTypeRegistryInterface
     */
    protected $registry;

    public function __construct(BlockTypeRegistryInterface $registry = null)
    {
        $this->registry = $registry ?: new BlockTypeRegistry();
    }

    /**
     * Creates a block.
     *
     * @param string $name
     * @param string|BlockTypeInterface $type
     * @param array $options
     *
     * @return BlockInterface
     */
    public function createBlock($name, $type, array $options = [])
    {
        $block = new Block($name, $this);

        $type = $this->registry->getType($type);
        $block->setType($type);

        $types = $this->registry->getInheritedTypes(get_class($type));

        // call block types createBlock method
        foreach ($types as $blockType) {
            $blockType->createBlock($block, $options);
        }

        return $block;
    }
}
