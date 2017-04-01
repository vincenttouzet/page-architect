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
use Saf\PageArchitect\Block\Type\ImageType;
use Saf\PageArchitect\BlockTypeRegistry;

class BlockTypeRegistryTest extends \PHPUnit_Framework_TestCase
{
    /** @var BlockTypeRegistry */
    protected $registry;

    protected function setUp()
    {
        $this->registry = new BlockTypeRegistry();
    }

    public function testRegister()
    {
        $type = new BlockType();

        $this->registry->register($type);

        // try to check by type
        $this->assertTrue($this->registry->hasType($type));
        // try to check by type name
        $this->assertTrue($this->registry->hasType($type->getName()));
        // try to check by type FQDN
        $this->assertTrue($this->registry->hasType(BlockType::class));
    }

    public function testInheritedTypes()
    {
        $this->registry->register(new BlockType());
        $this->registry->register(new ImageType());

        $types = $this->registry->getInheritedTypes(ImageType::class);

        $this->assertEquals(2, count($types));
    }

    /**
     * @expectedException \Saf\PageArchitect\TypeNotRegisteredException
     */
    public function testTypeNotFoundException()
    {
        $this->registry->getType('unknown');
    }
}
