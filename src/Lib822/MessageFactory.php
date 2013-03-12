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
     * @param \Lib822\HeaderCollection[] $headers Map of HeaderCollection objects representing the message headers
     * @param string                     $body    The message body
     */
    public function create(array $headers, $body)
    {
        return new Message($headers, $body);
    }
}
