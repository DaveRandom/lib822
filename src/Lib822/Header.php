<?php
/**
 * Class representing a single header field
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
 * Class representing a single header field
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class Header
{
    /**
     * @var string The name of the header field
     */
    protected $name;

    /**
     * @var string The value of the header field
     */
    protected $value;

    /**
     * Constructor
     *
     * @param string $name  The name of the header field
     * @param string $value The value of the header field
     */
    public function __construct($name, $value)
    {
        $this->name  = $name;
        $this->value = $value;
    }

    /**
     * Convert to string
     *
     * @return string The value of the header field
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * Get the name of the header field
     *
     * @return string The name of the header field
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of the header field
     *
     * @return string The value of the header field
     */
    public function getValue()
    {
        return $this->value;
    }
}
