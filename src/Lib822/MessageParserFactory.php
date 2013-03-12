<?php
/**
 * Factory which makes MessageParser objects
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
 * Factory which makes MessageParser objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class MessageParserFactory
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
     */
    public function __construct()
    {
        $this->headerFactory           = new HeaderFactory;
        $this->headerCollectionFactory = new HeaderCollectionFactory;
        $this->messageFactory          = new MessageFactory;
    }

    /**
     * Create a new MessageParser object
     *
     * @return \Lib822\MessageParser The created Header object
     */
    public function create()
    {
        return new MessageParser(
            $this->headerFactory,
            $this->headerCollectionFactory,
            $this->messageFactory
        );
    }
}
