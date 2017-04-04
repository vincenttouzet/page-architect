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

use Saf\PageArchitect\Block\Type\BlockType;
use Saf\PageArchitect\Block\Type\GridType;
use Saf\PageArchitect\BlockFactory;
use Saf\PageArchitect\Util\Responsive;

class GridTypeTest extends \PHPUnit_Framework_TestCase
{
    public function testColumnCountOptionInt()
    {
        $block = $this->createBlock(['column_count' => 12]);

        $this->assertEquals(12, $block->getExtra('column_count'));
    }

    public function testColumnCountOptionString()
    {
        $block = $this->createBlock(['column_count' => '12']);

        $this->assertEquals('12', $block->getExtra('column_count'));
    }

    public function testColumnCountOptionArray()
    {
        $block = $this->createBlock([
            'column_count' => [Responsive::MOBILE_PORTRAIT => 12, Responsive::TABLET_PORTRAIT => 6]
        ]);

        $columnCount = $block->getExtra('column_count');
        $this->assertEquals(12, $columnCount[Responsive::MOBILE_PORTRAIT]);
        $this->assertEquals(6, $columnCount[Responsive::TABLET_PORTRAIT]);
    }

    /**
     * @expectedException \Saf\PageArchitect\BlockTypeNotAllowedException
     */
    public function testAddChildException()
    {
        $block = $this->createBlock(['column_count' => 12]);

        $block->add('child', BlockType::class);
    }

    /**
     * @param array $options
     * @return \Saf\PageArchitect\BlockInterface
     */
    protected function createBlock($options = [])
    {
        $factory = new BlockFactory();
        $block = $factory->createBlock('block', GridType::class, $options);

        return $block;
    }
}
