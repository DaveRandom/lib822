<?php
/**
 * Factory which makes Header objects
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
 * Factory which makes Header objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderFactory
{
    /**
     * Create a new Header object
     *
     * @param string $name  The name of the header field
     * @param string $value The value of the header field
     *
     * @return \Lib822\Header The created Header object
     */
    public function create($name, $value)
    {
        return new Header($name, $value);
    }
}
