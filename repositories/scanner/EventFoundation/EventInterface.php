<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation;


/**
 * Interface EventInterface
 * @package Mussel\EventFoundation
 * @author Matthias Kaschubowski
 */
interface EventInterface
{
    /**
     * sets the emitter used for emit(). Usually called by the emitter to assign himself to the event.
     *
     * @param Emitter $emitter
     * @return mixed
     */
    public function setEmitter(Emitter $emitter);

    /**
     * prevents the current event to propagate.
     *
     * @return EventInterface
     */
    public function stopPropagation();

    /**
     * checks if the event propagation is stopped.
     *
     * @return bool
     */
    public function isPropagationStopped();

    /**
     * emits an event.
     *
     * @param EventInterface $event
     * @return mixed
     */
    public function emit(EventInterface $event);

    /**
     * returns the event name.
     *
     * @return string
     */
    public function getName();
}