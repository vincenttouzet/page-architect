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

interface BlockInterface extends \ArrayAccess, \Countable
{
    /**
     * Returns the name of the block.
     *
     * @return string
     */
    public function getName();

    /**
     * Set the parent block.
     *
     * @param BlockInterface|null $parent
     *
     * @return self
     */
    public function setParent(BlockInterface $parent = null);

    /**
     * Returns the parent block.
     *
     * @return self|null
     */
    public function getParent();

    /**
     * Sets the block as renderable or not.
     *
     * @param bool $display
     *
     * @return mixed
     */
    public function setDisplay($display);

    /**
     * Returns whether the block must be rendered or not.
     *
     * @return bool
     */
    public function isDisplayed();

    /**
     * Returns the attributes of the block.
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Sets the attributes of the block.
     *
     * @param array $attributes
     *
     * @return self
     */
    public function setAttributes($attributes);

    /**
     * Sets an attribute.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function addAttribute($name, $value);

    /**
     * Returns the attribute with the given name.
     *
     * @param string $name
     * @param null   $default
     *
     * @return mixed|null
     */
    public function getAttribute($name, $default = null);

    /**
     * Returns the extras of the block.
     *
     * @return array
     */
    public function getExtras();

    /**
     * Sets the extras of the block.
     *
     * @param array $extras
     *
     * @return self
     */
    public function setExtras($extras);

    /**
     * Sets an extra.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function addExtra($name, $value);

    /**
     * Returns the extra with the given name.
     *
     * @param string $name
     * @param null   $default
     *
     * @return mixed|null
     */
    public function getExtra($name, $default = null);

    /**
     * Add a new block.
     *
     * @param string|BlockInterface     $child
     * @param string|BlockTypeInterface $type
     * @param array                     $options
     *
     * @return self
     */
    public function add($child, $type = null, array $options = []);

    /**
     * Returns the child with the given name.
     *
     * @param string $name
     *
     * @return self
     *
     * @throws \OutOfBoundsException If the named child does not exist.
     */
    public function get($name);

    /**
     * Returns whether a child with the given name exists.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has($name);

    /**
     * Removes a child by its name.
     *
     * @param string $name
     *
     * @return self
     */
    public function remove($name);

    /**
     * Returns all children.
     *
     * @return self[]
     */
    public function all();
}
