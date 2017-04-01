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

interface BlockTypeRegistryInterface
{
    /**
     * Register a block type.
     *
     * @param BlockTypeInterface $type The type instance
     *
     * @return $this
     */
    public function register(BlockTypeInterface $type);

    /**
     * Returns whether a block type of the given name is registered.
     *
     * @param string $name
     *
     * @return bool
     */
    public function hasType($name);

    /**
     * Returns a block type with the given name
     *
     * @param string $name
     *
     * @return BlockTypeInterface
     *
     * @throws TypeNotRegisteredException
     */
    public function getType($name);

    /**
     * Returns the inherited list of block type with the given name.
     * The list must be ordered with parents first
     *
     * @param string $name
     *
     * @return BlockTypeInterface[]
     *
     * @throws TypeNotRegisteredException
     */
    public function getInheritedTypes($name);
}
