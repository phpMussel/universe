<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\EventFoundation\Events;


use Mussel\EventFoundation\Events\Abstracts\AbstractEvent;

/**
 * Class InfectedFileEvent
 * @package Mussel\EventFoundation\Events
 * @author Matthias Kaschubowski
 */
class InfectedFileEvent extends AbstractEvent
{
    const EVENT_NAME = 'file.infected';

    /**
     * @var \SplFileInfo
     */
    protected $file;

    /**
     * InfectedFileEvent constructor.
     *
     * @param \SplFileInfo $file
     */
    public function __construct(\SplFileInfo $file)
    {
        $this->file = $file;
    }

    /**
     * returns the SplFileInfo instance for the infected file.
     *
     * @return \SplFileInfo
     */
    public function getFile()
    {
        return $this->file;
    }
}