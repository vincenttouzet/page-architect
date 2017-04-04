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

use Saf\PageArchitect\Renderer\RendererInterface;
use Saf\PageArchitect\Theme\ThemeInterface;

class Architect
{
    /** @var ThemeInterface */
    protected $theme;

    /** @var RendererInterface */
    protected $renderer;

    /**
     * @return ThemeInterface
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * @param ThemeInterface $theme
     * @return self
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;
        return $this;
    }

    /**
     * @return RendererInterface
     */
    public function getRenderer()
    {
        return $this->renderer;
    }

    /**
     * @param RendererInterface $renderer
     * @return self
     */
    public function setRenderer($renderer)
    {
        $this->renderer = $renderer;
        return $this;
    }
}
