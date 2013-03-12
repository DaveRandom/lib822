<?php
/**
 * Class representing a collection of headers with the same field name
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
 * Class representing a collection of headers with the same field name
 *
 * @package Lib822
 * @author  Chris Wright <info@daverandom.com>
 */
class HeaderCollection extends ImmutableCollection
{
    /**
     * @var string The name of the header field this collection represents
     */
    protected $name;

    /**
     * Constructor
     *
     * @param \Lib822\Header[] $headers Ordered list of Header objects
     * @param string           $name    The name of the header field this collection represents
     */
    public function __construct(array $headers, $name)
    {
        parent::__construct($headers);
        $this->name = $name;
    }

    /**
     * Convert to string
     *
     * This mechanism is actually defined in RFC2616,  RFC822 doesn't specify a standard mechanism for collapsing
     * a generic header to a single value.  However, it makes more sense to implement the functionality here than
     * anywhere else - a consumer of this library will know whether or not this makes sense for a given use case.
     *
     * @return string String representing the collection of headers
     */
    public function __toString()
    {
        return implode(', ', $this->headers);
    }

    /**
     * Get the name of the header field this collection represents
     *
     * @return string The name of the header field this collection represents
     */
    public function getName()
    {
        return $this->name;
    }
}
