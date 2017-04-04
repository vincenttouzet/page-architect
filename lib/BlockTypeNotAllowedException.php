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

class BlockTypeNotAllowedException extends \Exception
{
    public function __construct($type, BlockTypeInterface $parentBlockType)
    {
        parent::__construct(sprintf(
            'A block of type "%s" is not allowed under a "%s" block. Allowed types : [%s]',
            $type,
            $parentBlockType->getName(),
            implode(', ', $parentBlockType->getAllowedChildTypes())
        ));
    }
}
