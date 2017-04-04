<?php

/*
 * This file is part of the PageArchitect project.
 *
 * (c) Vincent Touzet <vincent.touzet@dotsafe.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Saf\PageArchitect\Block\Type;

use Saf\PageArchitect\BlockInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('image_uri');
        $resolver->setAllowedTypes('image_uri', 'string');
    }

    public function getAllowedChildTypes()
    {
        return [];
    }
}
