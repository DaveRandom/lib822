<?php
/**
 * Parser which creates RFC822 message objects from strings
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
 * Parser which creates RFC822 message objects from strings
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class MessageParser
{
    /**
     * @var \Lib822\HeaderFactory Factory which makes Header objects
     */
    protected $headerFactory;

    /**
     * @var \Lib822\HeaderCollectionFactory Factory which makes HeaderCollection objects
     */
    protected $headerCollectionFactory;

    /**
     * @var \Lib822\MessageFactory Factory which makes Message objects
     */
    protected $messageFactory;

    /**
     * Constructor
     *
     * @param \Lib822\HeaderFactory           $headerFactory           Factory which makes Header objects
     * @param \Lib822\HeaderCollectionFactory $headerCollectionFactory Factory which makes HeaderCollection objects
     * @param \Lib822\MessageFactory          $messageFactory          Factory which makes Message objects
     */
    public function __construct(
        HeaderFactory $headerFactory,
        HeaderCollectionFactory $headerCollectionFactory,
        MessageFactory $messageFactory
    ) {
        $this->headerFactory           = $headerFactory;
        $this->headerCollectionFactory = $headerCollectionFactory;
        $this->messageFactory          = $messageFactory;
    }

    /**
     * Split a message into head and body sections
     *
     * @param string $message The message string
     *
     * @return array Head at index 0, body at index 1
     */
    protected function splitHeadFromBody($message)
    {
        $parts = preg_split('/\r?\n\r?\n/', ltrim($message), 2);

        return array(
            $parts[0],
            isset($parts[1]) ? $parts[1] : null
        );
    }

    /**
     * Parse the header section into a normalized array
     *
     * @param string $head The message head section
     *
     * @return array The parsed headers
     */
    protected function parseHeaders($head)
    {
        $expr =
        '!
          ^
          ([^()<>@,;:\\"/[\]?={} \t]+)          # Header name
          [ \t]*:[ \t]*
          (
            (?:
              (?:                               # First line of value
                (?:"(?:[^"\\\\]|\\\\.)*"|\S+)   # Quoted string or unquoted token
                [ \t]*                          # LWS
              )*
              (?:                               # Folded lines
                \r?\n
                [ \t]+                          # ...must begin with LWS
                (?:
                  (?:"(?:[^"\\\\]|\\\\.)*"|\S+) # ...followed by quoted string or unquoted tokens
                  [ \t]*                        # ...and maybe some more LWS
                )*
              )*
            )?
          )
          \r?$
        !smx';
        preg_match_all($expr, $head, $matches);

        $headers = array();
        for ($i = 0; isset($matches[0][$i]); $i++) {
            $name = strtolower($matches[1][$i]);
            if (!isset($headers[$name])) {
                $headers[$name] = array();
            }

            $value = preg_replace('/\s+("(?:[^"\\\\]|\\\\.)*"|\S+)/s', ' $1', trim($matches[2][$i]));

            $headers[$name][] = $this->headerFactory->create($name, $value);
        }

        foreach ($headers as $name => $header) {
            $headers[$name] = $this->headerCollectionFactory->create($headers[$name], $name);
        }

        return $headers;
    }

    /**
     * Create a message object from a string
     *
     * @param string $message The message string
     *
     * @return \Lib822\Message The parsed message object
     */
    public function parseMessage($message)
    {
        list($head, $body) = $this->splitHeadFromBody($message);
        $headers = $this->parseHeaders($head);

        return $this->messageFactory->create($headers, $body);
    }
}
