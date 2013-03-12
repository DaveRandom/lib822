<?php
/**
 * Factory which makes HeaderTokenizer objects
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
 * Factory which makes HeaderTokenizer objects
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderTokenizerFactory
{
    /**
     * @var \Lib822\HeaderTokenCollectionFactory Factory which makes HeaderToken objects
     */
    protected $tokenCollectionFactory;

    /**
     * @var \Lib822\HeaderTokenFactory Factory which makes HeaderToken objects
     */
    protected $tokenFactory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tokenFactory           = new HeaderTokenFactory;
        $this->tokenCollectionFactory = new HeaderTokenCollectionFactory;
    }

    /**
     * Create a new HeaderTokenizer object
     *
     * @return \Lib822\HeaderTokenizer The created HeaderTokenizer object
     */
    public function create()
    {
        return new HeaderTokenizer($this->tokenCollectionFactory, $this->tokenFactory);
    }
}
