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

/**
 * Default implementation of the BlockInterface
 */
class Block implements BlockInterface
{
    /**
     * Name of the block. Used as id for the parent
     *
     * @var string
     */
    protected $name = null;

    /**
     * @var BlockFactoryInterface
     */
    protected $factory;

    /**
     * Type of the block
     *
     * @var BlockTypeInterface
     */
    protected $type = null;

    /**
     * Whether the block must be displayed or not
     * @var boolean
     */
    protected $display = true;

    /**
     * Attributes for the block
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Children of the block
     *
     * @var Block[]
     */
    protected $children = [];

    /**
     * Parent block
     *
     * @var Block|null
     */
    protected $parent = null;

    /**
     * Extras attributes.
     *
     * @var array
     */
    protected $extras;

    /**
     * Class constructor.
     *
     * @param string                $name
     * @param BlockFactoryInterface $factory
     */
    public function __construct($name, BlockFactoryInterface $factory)
    {
        $this->name = (string)$name;
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return BlockTypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param BlockTypeInterface $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisplayed()
    {
        return $this->display;
    }

    /**
     * @param bool $display
     * @return self
     */
    public function setDisplay($display)
    {
        $this->display = $display;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return self
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param $name
     * @param $value
     * @return $this
     */
    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * @param $name
     * @param null $default
     * @return mixed|null
     */
    public function getAttribute($name, $default = null)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }

        return $default;
    }

    /**
     * @return array
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     * @return $this
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function addExtra($name, $value)
    {
        $this->extras[$name] = $value;

        return $this;
    }

    /**
     * @param string $name
     * @param null $default
     * @return mixed|null
     */
    public function getExtra($name, $default = null)
    {
        if (isset($this->extras[$name])) {
            return $this->extras[$name];
        }

        return $default;
    }

    /**
     * {@inheritdoc}
     */
    public function setParent(BlockInterface $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @{inheritdoc}
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * {@inheritdoc}
     */
    public function add($child, $type = null, array $options = [])
    {
        if (!$child instanceof BlockInterface) {
            // use factory to create a new block
            $child = $this->factory->createBlock($child, $type, $options);
        }

        $child->setParent($this);
        $this->children[$child->getName()] = $child;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function get($name)
    {
        if ($this->has($name)) {
            return $this->children[$name];
        }

        throw new \OutOfBoundsException(sprintf('The block "%s" has no child named %s', $this->getName(), $name));
    }

    /**
     * {@inheritdoc}
     */
    public function has($name)
    {
        return isset($this->children[$name]);
    }

    /**
     * {@inheritdoc}
     */
    public function remove($name)
    {
        if ($this->has($name)) {
            unset($this->children[$name]);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->children;
    }

    /**
     * Returns whether a child with the given name exists.
     * (implements the \ArrayAccess interface)
     *
     * @param string $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    /**
     * Returns the child with the given name.
     * (implements the \ArrayAccess interface)
     *
     * @param string $offset
     *
     * @return BlockInterface
     *
     * @throws \OutOfBoundsException If the named child does not exist.
     */
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    /**
     * Adds a child to the block (implements \ArrayAccess interface)
     * @param string         $offset Ignored. The name if the child is used.
     * @param BlockInterface $value  The child to add.
     *
     * @see self::add()
     */
    public function offsetSet($offset, $value)
    {
        $this->add($value);
    }

    /**
     * Removes the child with the given name (implements \ArrayAccess interface).
     *
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        $this->remove($offset);
    }

    /**
     * Returns the number of children (implements \Countable interface).
     *
     * @return int
     */
    public function count()
    {
        return count($this->children);
    }
}
