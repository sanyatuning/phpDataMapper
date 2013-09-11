<?php

namespace DataMapper;

/**
 * Description of TestCase
 *
 * @author sanyatuning
 */
class TestCase extends \PHPUnit_Framework_TestCase {

    /**
     * Return database adapter for use
     * Really hate to have to do it this way... Those TestSuites should be far easier than they are...
     */
    private static $fixture_adapter = null;

    protected static function fixtureAdapter() {
        if (self::$fixture_adapter === null) {
            // New db connection
            self::$fixture_adapter = new Adapter\SQLite(':memory:');
        }
        return self::$fixture_adapter;
    }

    /**
     * Return mapper for use
     */
    private static $fixture_mappers = array();

    protected static function fixtureMapper($mapperName) {
        if (!isset(self::$fixture_mappers[$mapperName])) {
            $mapperClass = 'Fixture_' . $mapperName . '_Mapper';
            self::$fixture_mappers[$mapperName] = new $mapperClass(self::fixtureAdapter());
        }
        return self::$fixture_mappers[$mapperName];
    }

}

