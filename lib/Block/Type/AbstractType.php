<?php

/*
 * This file is part of the PageArchitect package.
 *
 * (c) Vincent Touzet <vincent.touzet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saf\PageArchitect\Block\Type;

use Saf\PageArchitect\BlockInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractType implements BlockTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function createBlock(BlockInterface $block, array $options = [])
    {
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getAllowedChildTypes()
    {
        return [BlockType::class];
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return BlockType::class;
    }

    public function getName()
    {
        return get_class($this);
    }
}
