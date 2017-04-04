<?php

/*
 * This file is part of the PageArchitect project.
 *
 * (c) Vincent Touzet <vincent.touzet@dotsafe.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tests\Saf\PageArchitect\Block\Type;

use Saf\PageArchitect\Block\Type\BlockType;
use Saf\PageArchitect\Block\Type\ImageType;
use Saf\PageArchitect\BlockFactory;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @var ImageType */
    protected $type;

    public function setUp()
    {
        $this->type = new ImageType();
    }

    public function testConfigureOptions()
    {
        $resolver = new OptionsResolver();
        $this->type->configureOptions($resolver);

        $options = $resolver->resolve([
            'image_uri' => 'http://example.com/img.jpg'
        ]);

        $this->assertEquals('http://example.com/img.jpg', $options['image_uri']);
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\MissingOptionsException
     */
    public function testImageUriRequired()
    {
        $resolver = new OptionsResolver();
        $this->type->configureOptions($resolver);

        $resolver->resolve();
    }

    public function testCreateBlock()
    {
        $factory = new BlockFactory();
        $block = $factory->createBlock('image', ImageType::class, [
            'image_uri' => 'http://example.com/img.jpg',
        ]);

        $this->assertEquals('http://example.com/img.jpg', $block->getExtra('image_uri'));
    }

    /**
     * @expectedException \Saf\PageArchitect\BlockTypeNotAllowedException
     */
    public function testAaddChild()
    {
        $factory = new BlockFactory();
        $block = $factory->createBlock('image', ImageType::class, [
            'image_uri' => 'http://example.com/img.jpg',
        ]);

        $block->add('sub', BlockType::class);
    }
}
