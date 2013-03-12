<?php
/**
 * Class for creating a list of tokens from a header value
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
 * Class for creating a list of tokens from a header value
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderTokenizer
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
     *
     * @param \Lib822\HeaderTokenCollectionFactory $tokenCollectionFactory Factory which makes HeaderTokenCollection objects
     * @param \Lib822\HeaderTokenFactory           $tokenFactory           Factory which makes HeaderToken objects
     */
    public function __construct(HeaderTokenCollectionFactory $tokenCollectionFactory, HeaderTokenFactory $tokenFactory)
    {
        $this->tokenCollectionFactory = $tokenCollectionFactory;
        $this->tokenFactory           = $tokenFactory;
    }

    /**
     * Tokenize a header field
     *
     * @param \Lib822\Header The header field to tokenize
     *
     * @return \Lib822\HeaderTokenCollection Collection of tokens from the header field
     */
    public function tokenizeHeader(Header $header)
    {
        $expr =
        '/
          (?:([^ \t=]+)[ \t]*=[ \t]*)?           # optional parameter name
          (?:"((?:[^"\\\\]|\\\\.)*)"|([^ \t]+?)) # quoted string or unquoted token
          [ \t]*                                 # optional trailing LWS
          (?:;|$|;$)                             # end of subject or semi-colon delimiter
        /sx';
        preg_match_all($expr, $header->getValue(), $matches);

        $tokens = array();
        for ($i = 0; isset($matches[0][$i]); $i++) {
             $name = $matches[1][$i] !== '' ? strtolower($matches[1][$i]) : null;
             $value = $matches[2][$i] !== '' ? $matches[2][$i] : $matches[3][$i];

             $tokens[$i] = $this->tokenFactory->create($value, $i, $name);
        }

        return $this->tokenCollectionFactory->create($tokens);
    }
}
