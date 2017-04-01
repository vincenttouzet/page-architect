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

use Saf\PageArchitect\Block;
use Saf\PageArchitect\Block\Type\BlockType;
use Saf\PageArchitect\BlockFactory;

class BlockTest extends \PHPUnit_Framework_TestCase
{
    /** @var Block */
    protected $root;

    protected function setUp()
    {
        $factory = new BlockFactory();
        $this->root = $factory->createBlock('root', BlockType::class);
    }

    public function testAdd()
    {
        $this->root->add('child1', BlockType::class, [
            'display' => true,
        ]);

        $child = $this->root->get('child1');

        $this->assertTrue($child->isDisplayed());
        $this->assertEquals('child1', $child->getName());
        $this->assertTrue(isset($this->root['child1']));

        $this->assertEquals($this->root, $child->getParent(), 'The parent child of a block must be the block that created the child.');
    }

    public function testRemoveChild()
    {
        $this->root->add('child1', BlockType::class)
            ->add('child2', BlockType::class);

        $this->assertEquals(2, $this->root->count(), 'The block must have two children.');
        $this->root->remove('child1');
        $this->assertEquals(1, $this->root->count(), 'The block must have one child after removing one.');
        $this->assertFalse($this->root->has('child1'));

        // remove with offsetUnset
        unset($this->root['child2']);
        $this->assertEquals(0, $this->root->count(), 'The block must have one child after removing one.');
        $this->assertFalse($this->root->has('child2'));
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testGetUnsetChild()
    {
        $unknown = $this->root->get('unknown');
    }

    /**
     * @expectedException \OutOfBoundsException
     */
    public function testOffsetGetUnsetChild()
    {
        $unknown = $this->root['unknown'];
    }
}
