<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel;


use Mussel\EventFoundation\Emitter;

/**
 * Class Mussel
 * @package Mussel
 * @author Matthias Kaschubowski
 */
class Mussel
{
    /**
     * @var string[]
     */
    protected $plugins = [];
    /**
     * @var Emitter
     */
    protected $emitter;

    /**
     * Mussel constructor.
     */
    public function __construct()
    {
        $this->emitter = new Emitter();
    }

    /**
     * registers a plugin. Skips already registered plugins.
     *
     * @param Plugin $plugin
     * @return $this
     */
    public function withPlugin(Plugin $plugin)
    {
        $class = get_class($plugin);

        if ( ! in_array($class, $this->plugins) )
        {
            $this->emitter->subscribe($plugin);
            $this->plugins[] = $class;
        }

        return $this;
    }
}