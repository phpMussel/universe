<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\PluginFoundation;


use Mussel\EventFoundation\Events\InfectedFileEvent;

/**
 * Interface WhenInfected
 * @package Mussel\PluginFoundation
 * @author Matthias Kaschubowski
 */
interface WhenInfected
{
    /**
     * @param InfectedFileEvent $event
     * @return null
     */
    public function whenInfected(InfectedFileEvent $event);
}