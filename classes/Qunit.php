<?php
/**
 * Qunit abstract class, defines internal data handling methods.
 *
 * @author     Samantha Quinones
 * @package    Qunit
 * @subpackage classes
 */
namespace Qunit;

abstract class Qunit 
{
    /**
     * @var array Private pseudo-properties
     */
    protected $_properties = array();

    // getters & setters
    public function __get($property)
    {
        if(!array_key_exists($property,$this->_properties)) {
            throw new QunitPropertyException;
        }
        return $this->_properties[$property];
    }
    
    public function __set($property,$value)
    {
        $this->_properties[$property] = $value;
    }
    
    public function __isset($property)
    {
        return isset($this->_properties[$property]);
    }
}