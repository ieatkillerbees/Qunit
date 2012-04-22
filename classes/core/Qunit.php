<?php
/**
 * Qunit.php
 * 
 * Class definition for the Qunit abstract base class.
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License
 * @package Qunit.core
 */

namespace Qunit\core;

/**
 * Qunit abstract class, defines internal data handling methods.
 *
 * @package    Qunit.core
 */
abstract class Qunit 
{
    /**
     * Private pseudo-properties
     * @var array 
     */
    protected $_properties = array();

    // getters & setters
    /**
     * Magic getter
     * @param string $property
     * @return mixed
     * @throws QunitPropertyException 
     * @internal
     */
    public function __get($property)
    {
        if(!array_key_exists($property,$this->_properties)) {
            throw new QunitPropertyException;
        }
        return $this->_properties[$property];
    }

    /**
     * Magic setter
     * @param string $property
     * @param mixed $value 
     * @internal
     */
    public function __set($property,$value)
    {
        $this->_properties[$property] = $value;
    }
    
    /**
     * Magic isset
     * @param string $property
     * @return boolean
     * @internal
     */
    public function __isset($property)
    {
        return isset($this->_properties[$property]);
    }
}