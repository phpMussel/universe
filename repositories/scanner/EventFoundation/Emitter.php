<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation;


use Psr\Log\LoggerInterface;


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
     * @var null|LoggerInterface
     */
    protected $logger;

    /**
     * Emitter constructor.
     * @param LoggerInterface|null $logger
     */
    public function __construct(LoggerInterface $logger = null)
    {
        $this->logger = $logger;
    }

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
                call_user_func($callbacks, $event, $this->logger);

                if ( $event->isPropagationStopped() )
                {
                    break;
                }
            }
        }

        return $event;
    }

    /**
     * constructs an event object with the given parameters only if the event is known and emits the event.
     *
     * @param $eventClassName
     * @param array $parameters
     * @return EventInterface|null
     */
    public function emitIf($eventClassName, array $parameters = [])
    {
        $eventReflection = new \ReflectionClass($eventClassName);

        if ( array_key_exists($eventReflection->getConstant('EVENT_NAME'), $this->subscribers) )
        {
            /** @var EventInterface $event */
            $event = $eventReflection->newInstanceArgs($parameters);

            return $this->emit($event);
        }

        return null;
    }
}