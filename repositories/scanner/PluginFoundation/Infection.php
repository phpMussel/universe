<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\PluginFoundation;


use Mussel\EventFoundation\Events\InfectedFileEvent;
use Psr\Log\LoggerInterface;

/**
 * Interface WhenInfected
 * @package Mussel\PluginFoundation
 * @author Matthias Kaschubowski
 */
interface Infection
{
    /**
     * @param InfectedFileEvent $event
     * @param LoggerInterface|null $logger
     * @return null
     */
    public function onInfectedFile(InfectedFileEvent $event, LoggerInterface $logger = null);
}