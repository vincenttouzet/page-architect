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


class TypeNotRegisteredException extends \Exception
{
    public function __construct($name = "", $code = 0, $previous = null)
    {
        parent::__construct(sprintf('The block type "%s" is not registered yet.', $name), $code, $previous);
    }

}
