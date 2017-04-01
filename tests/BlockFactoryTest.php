<?php

/*
 * This file is part of the PageArchitect project.
 *
 * (c) Vincent Touzet <vincent.touzet@dotsafe.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Saf\PageArchitect;

use Saf\PageArchitect\Block\Type\BlockType;
use Saf\PageArchitect\BlockFactory;

class BlockFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $factory = new BlockFactory();

        $block = $factory->createBlock('my_block', BlockType::class, [
            'display' => true,
            'attributes' => [
                'class' => 'my-block'
            ],
            'extras' => [
                'var' => 'value',
            ],
        ]);

        $this->assertTrue($block->isDisplayed());
        $this->assertEquals('my-block', $block->getAttribute('class'));
        $this->assertEquals('value', $block->getExtra('var'));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\UndefinedOptionsException
     */
    public function testUnknownOption()
    {
        $factory = new BlockFactory();
        $factory->createBlock('my_block', BlockType::class, [
            'unknown_option' => 'value',
        ]);
    }
}
