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

interface BlockTypeInterface
{
    /**
     * Returns the name of the block. Must be the FQCN of the block.
     * @return string
     */
    public function getName();

    /**
     * @param BlockInterface $block
     * @param array          $options
     */
    public function createBlock(BlockInterface $block, array $options = []);

    /**
     * Configure options.
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver);

    /**
     * Get the allowed child types.
     *
     * @return array
     */
    public function getAllowedChildTypes();

    /**
     * Get the parent block type.
     *
     * @return string
     */
    public function getParent();
}
