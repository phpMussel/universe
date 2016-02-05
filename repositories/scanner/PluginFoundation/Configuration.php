<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\PluginFoundation;


use Mussel\EventFoundation\Events\ConfigurationEvent;
use Psr\Log\LoggerInterface;

interface Configuration
{
    public function onConfiguration(ConfigurationEvent $event, LoggerInterface $logger = null);
}