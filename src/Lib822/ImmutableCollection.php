<?php
/**
 * Class representing a generic immutable collection
 *
 * PHP version 5.3
 *
 * @package   Lib822
 * @author    Chris Wright <info@daverandom.com>
 * @copyright Copyright (c) 2013 Chris Wright
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version   1.0
 */
namespace Lib822;

/**
 * Class representing a generic immutable collection
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 *
 * @property-read int $length The number of member items in the collection
 */
class ImmutableCollection implements \Countable, \Iterator, \ArrayAccess
{
    /**
     * @var array Ordered list of member items
     */
    private $items;

    /**
     * @var int The number of member items in the collection
     */
    private $length;

    /**
     * @var int The current pointer position for the Iterator interface
     */
    private $pointer = 0;

    /**
     * Constructor
     *
     * @param array $items Ordered list of member items
     */
    public function __construct(array $items)
    {
        $this->items  = array_values($items);
        $this->length = count($items);
    }

    /**
     * Property accessor
     *
     * @param string $name Name of the property being accessed
     *
     * @return mixed Value of the property being accessed
     */
    final public function __get($name)
    {
        if ($name === 'length') {
            return $this->length;
        }

        trigger_error('Undefined property: '.get_class($this).'::$'.$name, E_USER_NOTICE);
    }

    /**
     * Get the value of $length (Countable implementation)
     *
     * @return int The number of Header objects in the collection
     */
    final public function count()
    {
        return $this->length;
    }

    /**
     * Rewind the Iterator to the first element (Iterator implementation)
     */
    final public function rewind()
    {
        $this->pointer = 0;
    }

    /**
     * Checks if current position is valid (Iterator implementation)
     *
     * @return bool Whether the current position is valid
     */
    final public function valid()
    {
        return isset($this->items[$this->pointer]);
    }

    /**
     * Return the current element (Iterator implementation)
     *
     * @return mixed The current element
     */
    final public function current()
    {
        return $this->valid() ? $this->items[$this->pointer] : null;
    }

    /**
     * Return the key of the current element (Iterator implementation)
     *
     * @return int The key of the current element
     */
    final public function key()
    {
        return $this->pointer;
    }

    /**
     * Move forward to next element (Iterator implementation)
     */
    final public function next()
    {
        $this->pointer++;
    }

    /**
     * Test whether an item exists at the specified index (ArrayAccess implementation)
     *
     * @param int $index The index of the item being tested
     *
     * @return bool Whether an item exists at the specified index
     */
    final public function offsetExists($index)
    {
        return isset($this->items[$index]);
    }

    /**
     * Get the item at the specified index (ArrayAccess implementation)
     *
     * @param int $index The index of the item being retrieved
     *
     * @return mixed The item at the specified index
     */
    final public function offsetGet($index)
    {
        if (isset($this->items[$index])) {
            return $this->items[$index];
        }

        $backtrace = debug_backtrace();
        $error = 'Undefined offset: '.$index
               . ' referenced from '.$backtrace[0]['file'].' on line '.$backtrace[0]['line']
               . ' and emitted';
        trigger_error($error, E_USER_NOTICE);
    }

    /**
     * Set the value of the item at the specified index (ArrayAccess implementation)
     *
     * This method has no persistent effect, calling it emits an E_USER_NOTICE
     *
     * @param int   $index The index of the item being assigned
     * @param mixed $value The new value
     */
    final public function offsetSet($index, $value)
    {
        $backtrace = debug_backtrace();
        $error = 'Immutable collection cannot be mutated'
               . ' referenced from '.$backtrace[0]['file'].' on line '.$backtrace[0]['line']
               . ' and emitted';
        trigger_error($error, E_USER_NOTICE);
    }

    /**
     * Unset the item at the specified index (ArrayAccess implementation)
     *
     * This method has no persistent effect, calling it emits an E_USER_NOTICE
     *
     * @param int $index The index of the item being unset
     */
    final public function offsetUnset($index)
    {
        $backtrace = debug_backtrace();
        $error = 'Immutable collection cannot be mutated'
               . ' referenced from '.$backtrace[0]['file'].' on line '.$backtrace[0]['line']
               . ' and emitted';
        trigger_error($error, E_USER_NOTICE);
    }

    /**
     * Get an item from the collection by numeric index
     *
     * @param int $index The index of the item being retrieved
     *
     * @return mixed The item referenced by $index
     */
    final public function item($index)
    {
        return isset($this->items[$index]) ? $this->items[$index] : null;
    }
}
