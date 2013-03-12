<?php
/**
 * Factory which makes RFC822 message objects
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
 * Factory which makes RFC822 message objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class MessageFactory
{
    /**
     * Create a new RFC822 message object
     *
     * @param array  $headers The request headers
     * @param string $body    The request body
     */
    public function create($headers, $body)
    {
        return new Message($headers, $body);
    }
}
