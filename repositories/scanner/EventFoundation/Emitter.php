<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation;


/**
 * Event Emitter
 * @package Mussel\EventFoundation
 * @author Matthias Kaschubowski
 */
class Emitter
{
    /**
     * @var callable[][]
     */
    protected $subscribers = [];

    /**
     * @param EventSubscriberInterface $subscriber
     * @return Emitter
     */
    public function subscribe(EventSubscriberInterface $subscriber)
    {
        foreach ( $subscriber->getEvents() as $name => $callback )
        {
            $this->subscribers[$name][] = $callback;
        }

        return $this;
    }

    /**
     * @param EventInterface $event
     * @return EventInterface
     */
    public function emit(EventInterface $event)
    {
        $eventName = $event->getName();

        if ( ! array_key_exists($eventName, $this->subscribers) )
        {
            $event->setEmitter($this);

            foreach ( $this->subscribers[$eventName] as $callbacks )
            {
                call_user_func($callbacks, $event);

                if ( $event->isPropagationStopped() )
                {
                    break;
                }
            }
        }

        return $event;
    }
}