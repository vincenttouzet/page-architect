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

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class GridType
 *
 * Define a Grid block.
 *
 * A grid is composed of GridColumns.
 *
 * Options:
 *  - column_count: Array | string
 *      Number of columns for the grid. If set as an array the key must be for each responsive breakpoints.
 *
 * @see \Saf\PageArchitect\Util\Responsive
 */
class GridType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('column_count');
        $resolver->setAllowedTypes('column_count', ['array', 'string']);
    }

    public function getAllowedChildTypes()
    {
        return [GridColumnType::class];
    }
}
