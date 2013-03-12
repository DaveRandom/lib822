<?php
/**
 * Factory which makes HeaderToken objects
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
 * Factory which makes HeaderToken objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderTokenFactory
{
    /**
     * Create a new HeaderToken object
     *
     * @param string $value    The value of the token
     * @param int    $position The position of the token within the field
     * @param string $name     The name of the token for named parameters
     *
     * @return \Lib822\HeaderToken The created HeaderToken object
     */
    public function create($value, $position, $name = null)
    {
        return new HeaderToken($value, $position, $name);
    }
}
