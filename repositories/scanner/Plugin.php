<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel;


use Mussel\EventFoundation\Events\InfectedFileEvent;
use Mussel\EventFoundation\EventSubscriberInterface;
use Mussel\PluginFoundation\WhenInfected;

/**
 * Plugin abstract
 *
 * This class MUST be extended to create plugins. The registered events are based on the
 * used interfaces. See Mussel\PluginFoundation for available plugin listeners. Implement any of them
 * and define the contracted method(s).
 *
 * @package Mussel
 * @author Matthias Kaschubowski
 */
abstract class Plugin implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public function getEvents()
    {
        $events = [];

        if ( $this instanceof WhenInfected )
        {
            $events[InfectedFileEvent::EVENT_NAME] = [$this, 'whenInfected'];
        }

        # ToDo: Implement more general events.

        return $events;
    }
}