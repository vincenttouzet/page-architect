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

class BlockType extends AbstractType
{
    public function createBlock(BlockInterface $block, array $options = [])
    {
        $block->setDisplay($options['display']);
        $block->setAttributes($options['attributes']);
        $extras = $options['extras'];
        unset($options['display']);
        unset($options['attributes']);
        unset($options['extras']);
        // add other options to extras
        $extras = array_merge($extras, $options);
        $block->setExtras($extras);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'display'    => true,
            'attributes' => [],
            'extras'     => [],
        ]);

        $resolver->setAllowedTypes('display', 'bool');
        $resolver->setAllowedTypes('attributes', 'array');
        $resolver->setAllowedTypes('extras', 'array');
    }

    /**
     * Get the parent block type.
     *
     * @return string|null
     */
    public function getParent()
    {
        return null;
    }
}
