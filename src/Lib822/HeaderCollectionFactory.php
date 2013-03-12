<?php
/**
 * Factory which makes HeaderCollection objects
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
 * Factory which makes HeaderCollection objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderCollectionFactory
{
    /**
     * Create a new HeaderCollection object
     *
     * @param \Lib822\Header[] $headers Ordered list of Header objects
     * @param string           $name    The name of the header field this collection represents
     *
     * @return \Lib822\HeaderCollection The created HeaderCollection object
     */
    public function create(array $headers, $name)
    {
        return new HeaderCollection($headers, $name);
    }
}
