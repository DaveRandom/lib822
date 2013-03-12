<?php
/**
 * Class representing the basic RFC822 message format
 *
 * PHP version 5.3
 *
 * @package   Lib822
 * @author    Chris Wright <info@daverandom.com>
 * @copyright Copyright (c) 2013 Chris Wright
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version   1.1
 */
namespace Lib822;

/**
 * Class representing the basic RFC822 message format
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class Message
{
    /**
     * @var \Lib822\HeaderCollection[] Map of HeaderCollection objects representing the message headers
     */
    protected $headers = array();

    /**
     * @var string The message body
     */
    protected $body;

    /**
     * Constructor
     *
     * @param \Lib822\HeaderCollection[] $headers Map of HeaderCollection objects representing the message headers
     * @param string                     $body    The message body
     */
    public function __construct(array $headers, $body)
    {
        $this->headers = $headers;
        $this->body    = $body;
    }

    /**
     * Get all headers from the message
     *
     * @return \Lib822\HeaderCollection[] Map of HeaderCollection objects representing the message headers
     */
    public function getAllHeaders()
    {
        return $this->headers;
    }

    /**
     * Get a named header from the message
     *
     * @param string $name The name of the header
     *
     * @return \Lib822\HeaderCollection|null A collection of header objects, if any
     */
    public function getHeader($name)
    {
        $name = strtolower(trim($name));

        return isset($this->headers[$name]) ? $this->headers[$name] : null;
    }

    /**
     * Get the message body
     *
     * @return string The message body
     */
    public function getBody()
    {
        return $this->body;
    }
}
