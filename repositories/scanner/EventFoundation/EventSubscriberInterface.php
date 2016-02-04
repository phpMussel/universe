<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation;


/**
 * Interface EventSubscriberInterface
 * @package Mussel\EventFoundation
 * @author Matthias Kaschubowski
 */
interface EventSubscriberInterface
{
    /**
     * @return array[]
     */
    public function getEvents();
}