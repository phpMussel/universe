<?php
/**
 * This file is part of phpMussel Project.
 * (c) 2016 phpMussel Project maintainers, All rights reserved.
 *
 * The applied license is stored at the root directory of this package.
 */

namespace Mussel\Configuration;


use Mussel\ConfigurationInterface;

class ConfigurationNode implements ConfigurationInterface
{
    protected $items = [];

    /**
     * gets an item from the current configuration level, returns the default value if the item is not registered.
     *
     * @param $item
     * @param null $default
     * @return mixed
     */
    public function get($item, $default = null)
    {
        return $this->has($item) ? $this->items[$this->marshalKey($item)] : $default;
    }

    /**
     * sets an item for the current configuration level.
     *
     * @param $item
     * @param $content
     * @return ConfigurationInterface
     */
    public function set($item, $content)
    {
        $this->items[$this->marshalKey($item)] = is_array($content) ? new ConfigurationNode($content) : $content;
    }

    /**
     * checks whether an item exists or not.
     *
     * @param $item
     * @return mixed
     */
    public function has($item)
    {
        return array_key_exists($this->marshalKey($item), $this->items);
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize($this->items);
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        $this->items = unserialize($serialized);
    }

    /**
     * marshals a normalized key for the given item string
     *
     * @param string $item
     * @return string
     */
    public function marshalKey($item)
    {
        return strtolower($item);
    }

}