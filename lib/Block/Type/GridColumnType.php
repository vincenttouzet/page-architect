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
 * Class GridColumnType
 *
 * Define a GridColumn block.
 *
 * A GridColumn is directly under a Grid block
 *
 * Options:
 *  - column_width: Array | string
 *      Number of columns used by the block. If set as an array the key must be for each responsive breakpoints.
 *      Examples:
 *          - 4
 *              Will use 4 columns on the grid
 *          - [
 *              \Saf\PageArchitect\Util\Responsive::MOBILE_PORTRAIT => 12,
 *              \Saf\PageArchitect\Util\Responsive::TABLET_PORTRAIT => 6
 *          ]
 *              Will use 12 columns on MOBILE_PORTRAIT and 6 columns on TABLET_PORTRAIT
 *
 * @see \Saf\PageArchitect\Util\Responsive
 */
class GridColumnType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('column_width');
        $resolver->setAllowedTypes('column_width', ['array', 'string']);
    }
}
