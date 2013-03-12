<?php
/**
 * Class representing a collection of the tokens within a header field
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
 * Class representing a collection of the tokens within a header field
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderTokenCollection extends ImmutableCollection
{
    /**
     * @var string The value of the token
     */
    protected $namedParameters = array();

    /**
     * Constructor
     *
     * @param \Lib822\HeaderToken[] $tokens Ordered list of HeaderToken objects
     */
    public function __construct(array $tokens)
    {
        parent::__construct($tokens);

        foreach ($tokens as $token) {
            if ($token->getName() !== null) {
                $this->namedParameters[$token->getName()] = $token;
            }
        }
    }

    /**
     * Test whether the collection has a named parameter
     *
     * @return bool Whether the collection has a named parameter
     */
    public function hasNamedParameter($name)
    {
        return isset($this->namedParameters[strtolower($name)]);
    }

    /**
     * Get a named parameter
     *
     * @return \Lib822\HeaderToken The named parameter
     */
    public function getNamedParameter($name)
    {
        $name = strtolower($name);
        return isset($this->namedParameters[$name]) ? $this->namedParameters[$name] : null;
    }
}
