<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel;


/**
 * Interface ConfigurationInterface
 * @package Mussel
 * @author Matthias Kaschubowski
 */
interface ConfigurationInterface extends \Serializable
{
    /**
     * gets an item from the current configuration level, returns the default value if the item is not registered.
     *
     * @param $item
     * @param null $default
     * @return mixed
     */
    public function get($item, $default = null);

    /**
     * sets an item for the current configuration level.
     *
     * @param $item
     * @param $content
     * @return ConfigurationInterface
     */
    public function set($item, $content);

    /**
     * checks whether an item exists or not.
     *
     * @param $item
     * @return mixed
     */
    public function has($item);
}