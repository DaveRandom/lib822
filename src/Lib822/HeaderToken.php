<?php
/**
 * Class representing a single token from within a header field
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
 * Class representing a single token from within a header field
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderToken
{
    /**
     * @var string The value of the token
     */
    protected $value;

    /**
     * @var int The position of the token within the field
     */
    protected $position;

    /**
     * @var string The name of the token for named parameters
     */
    protected $name;

    /**
     * Constructor
     *
     * @param string $value    The value of the token
     * @param int    $position The position of the token within the field
     * @param string $name     The name of the token for named parameters
     */
    public function __construct($value, $position, $name = null)
    {
        $this->value    = $value;
        $this->position = $position;
        $this->name     = $name;
    }

    /**
     * Convert to string
     *
     * @return string The value of the header token
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * Get the value of the token
     *
     * @return string The value of the token
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the position of the token within the field
     *
     * @return int The position of the token within the field
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get the name of the token for named parameters
     *
     * @return string The name of the token for named parameters
     */
    public function getName()
    {
        return $this->name;
    }
}
