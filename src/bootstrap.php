<?php
/**
 * Bootstrap for the Lib822 library
 *
 * PHP version 5.3
 *
 * @package   Lib822
 * @author    Chris Wright <info@daverandom.com>
 * @copyright Copyright (c) 2013 Chris Wright
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @version   1.0
 */

call_user_func(function() {
    $classMap = array(
        'lib822\header'                       => __DIR__ . '/Lib822/Header.php',
        'lib822\headerfactory'                => __DIR__ . '/Lib822/HeaderFactory.php',
        'lib822\headercollection'             => __DIR__ . '/Lib822/HeaderCollection.php',
        'lib822\headercollectionfactory'      => __DIR__ . '/Lib822/HeaderCollectionFactory.php',
        'lib822\headertoken'                  => __DIR__ . '/Lib822/HeaderToken.php',
        'lib822\headertokenfactory'           => __DIR__ . '/Lib822/HeaderTokenFactory.php',
        'lib822\headertokencollection'        => __DIR__ . '/Lib822/HeaderTokenCollection.php',
        'lib822\headertokencollectionfactory' => __DIR__ . '/Lib822/HeaderTokenCollectionFactory.php',
        'lib822\headertokenizer'              => __DIR__ . '/Lib822/HeaderTokenizer.php',
        'lib822\headertokenizerfactory'       => __DIR__ . '/Lib822/HeaderTokenizerFactory.php',
        'lib822\immutablecollection'          => __DIR__ . '/Lib822/ImmutableCollection.php',
        'lib822\message'                      => __DIR__ . '/Lib822/Message.php',
        'lib822\messagefactory'               => __DIR__ . '/Lib822/MessageFactory.php',
        'lib822\messageparser'                => __DIR__ . '/Lib822/MessageParser.php',
        'lib822\messageparserfactory'         => __DIR__ . '/Lib822/MessageParserFactory.php',
    );

    if (function_exists('__autoload') && !in_array('__autoload', spl_autoload_functions())) {
       spl_autoload_register('__autoload');
    }

    spl_autoload_register(function($className) use($classMap) {
        $className = strtolower($className);

        if (isset($classMap[$className])) {
            require $classMap[$className];
        }
    });
});
