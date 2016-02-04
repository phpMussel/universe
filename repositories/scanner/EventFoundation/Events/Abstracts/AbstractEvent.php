<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation\Events\Abstracts;

use Mussel\EventFoundation\Emitter;
use Mussel\EventFoundation\EventInterface;

/**
 * Class AbstractEvent
 * @package Mussel\EventFoundation\Events\Abstracts
 * @author Matthias Kaschubowski
 */
abstract class AbstractEvent
{
    /**
     * @var Emitter
     */
    private $emitter;

    /**
     * sets the emitter used for emit(). Usually called by the emitter to assign himself to the event.
     *
     * @param Emitter $emitter
     */
    final public function setEmitter(Emitter $emitter)
    {
        $this->emitter = $emitter;
    }

    /**
     * emits an event.
     *
     * @param EventInterface $event
     * @return EventInterface
     */
    public function emit(EventInterface $event)
    {
        if ( $event instanceof self )
        {
            throw new \RuntimeException('Recursions are not awesome');
        }

        return $this->emitter->emit($event);
    }

    /**
     * defines the event name.
     *
     * @return string
     */
    public function getName()
    {
        if ( ! defined(get_called_class().'::EVENT:NAME') )
        {
            throw new \RuntimeException('Undefined event name');
        }

        return static::EVENT_NAME;
    }
}