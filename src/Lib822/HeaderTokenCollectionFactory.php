<?php
/**
 * Factory which makes HeaderTokenCollection objects
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
 * Factory which makes HeaderTokenCollection objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderTokenCollectionFactory
{
    /**
     * Create a new HeaderTokenCollection object
     *
     * @param \Lib822\HeaderToken[] $tokens Ordered list of HeaderToken objects
     *
     * @return \Lib822\HeaderTokenCollection The created HeaderTokenCollection object
     */
    public function create(array $tokens)
    {
        return new HeaderTokenCollection($tokens);
    }
}
