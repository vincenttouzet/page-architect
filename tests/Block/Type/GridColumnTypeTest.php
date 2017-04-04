<?php

/*
 * This file is part of the PageArchitect package.
 *
 * (c) Vincent Touzet <vincent.touzet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Saf\PageArchitect\Block\Type;

use Saf\PageArchitect\Block\Type\GridColumnType;
use Saf\PageArchitect\BlockFactory;
use Saf\PageArchitect\Util\Responsive;

class GridColumnTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testColumnCountOptionInt()
    {
        $block = $this->createBlock(['column_width' => 12]);

        $this->assertEquals(12, $block->getExtra('column_width'));
    }

    public function testColumnCountOptionString()
    {
        $block = $this->createBlock(['column_width' => '12']);

        $this->assertEquals('12', $block->getExtra('column_width'));
    }

    public function testColumnCountOptionArray()
    {
        $block = $this->createBlock([
            'column_width' => [Responsive::MOBILE_PORTRAIT => 12, Responsive::TABLET_PORTRAIT => 6]
        ]);

        $columnWidth = $block->getExtra('column_width');
        $this->assertEquals(12, $columnWidth[Responsive::MOBILE_PORTRAIT]);
        $this->assertEquals(6, $columnWidth[Responsive::TABLET_PORTRAIT]);
    }

    /**
     * @param array $options
     * @return \Saf\PageArchitect\BlockInterface
     */
    protected function createBlock($options = [])
    {
        $factory = new BlockFactory();
        $block = $factory->createBlock('block', GridColumnType::class, $options);

        return $block;
    }
}
