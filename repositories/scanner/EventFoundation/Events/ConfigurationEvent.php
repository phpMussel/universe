<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation\Events;


use Mussel\ConfigurationInterface;
use Mussel\EventFoundation\Events\Abstracts\AbstractEvent;

/**
 * Class ConfigurationEvent
 * @package Mussel\EventFoundation\Events
 * @author Matthias Kaschubowski
 */
class ConfigurationEvent extends AbstractEvent
{
    /**
     * @var ConfigurationInterface
     */
    protected $config;

    /**
     * ConfigurationEvent constructor.
     * @param ConfigurationInterface $config
     */
    public function __construct(ConfigurationInterface $config)
    {
        $this->config = $config;
    }

    /**
     * returns the configuration object.
     *
     * @return ConfigurationInterface
     */
    public function getConfiguration()
    {
        return $this->config;
    }
}