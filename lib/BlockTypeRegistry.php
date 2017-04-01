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

class BlockTypeRegistry implements BlockTypeRegistryInterface
{
    /**
     * @var BlockTypeInterface
     */
    protected $registry = [];

    /**
     * {@inheritdoc}
     */
    public function register($name, BlockTypeInterface $blockType)
    {
        $this->registry[$name] = $blockType;
    }

    /**
     * {@inheritdoc}
     */
    public function hasType($blockType)
    {
        $blockClass = $blockType;
        if ($blockType instanceof BlockTypeInterface) {
            $blockClass = get_class($blockType);
        }

        return isset($this->registry[$blockClass]);
    }

    /**
     * {@inheritdoc}
     */
    public function getType($name)
    {
        if (!isset($this->registry[$name])) {
            // try to create type
            if (class_exists($name)) {
                $type = new $name();
                $this->register($name, $type);
            } else {
                throw new TypeNotRegisteredException($name);
            }
        }

        return $this->registry[$name];
    }

    /**
     * {@inheritdoc}
     */
    public function getInheritedTypes($name)
    {
        $types = [];
        $type = $this->getType($name);
        if ($type) {
            if ($type->getParent()) {
                $types = $this->getInheritedTypes($type->getParent());
            }
            $types[] = $type;
        }

        return $types;
    }
}
