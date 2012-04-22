<?php
/**
 * Config.php
 * 
 * Configuration file handler
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License
 * @package    Qunit.core;
 */

namespace Qunit\core;

/**
 * Converter
 * @package Qunit.core
 */
class Converter extends Qunit
{
    /*
     * conversion flags 
     */
    
    /**
     * Convert from base 
     */
    const BASE_FROM = 0;
    
    /**
     * Convert to base 
     */
    const BASE_TO   = 1;
    
    /**
     * Configuration file
     * @var string
     */
    public $config_file;
    
    /**
     * Returns a list of units defined for the current dimension
     * @return array 
     */
    private function _getUnits()
    {
        $exclude  = array('dimension','defaults');
        $sections = $this->config->getSections();
        $units    = array_filter($sections, function ($value) use (&$exclude) {if(in_array($value,$exclude)) return false; else return true;});
        return array_values($units);
    }
    
    /**
     * Checks is a unit is defined in this dimension.
     * @param string $unit
     * @return boolean
     */
    private function _isUnit($unit)
    {
        return in_array($unit,$this->units);
    }
    
    /**
     * Returns a unit definition as an array.
     * @param string $unit      Unit name
     * @param string $variant   Variant name
     * @return array
     * @throws QunitInvalidUnit 
     */
    private function _getUnit($unit, $variant = NULL)
    {
        // throw an exception on an invalid unit
        if(!$this->_isUnit($unit)) {
            throw new QunitInvalidUnit;
        }
        
        // get the unit definition from the config unit
        $unit = $this->config->$unit;
        
        // if the factor param is an array, there are variants
        if(is_array($unit['factor'])) {
            // check the supplied variant to see if it's defined and use it
            if(array_key_exists($variant,$unit['factor'])) {
                $unit['factor'] = $unit['factor'][$variant];
            }
            // otherwise use the default variant, if defined
            elseif (array_key_exists('default_factor',$unit)) {
                $variant = $unit['default_factor'];
                $unit['factor'] = $unit['factor'][$variant];
            }
            // otherwise use the first factor
            else {
                $unit['factor'] = $unit['factor'][0];
            }
        }
        
        // merge with this dimension's defaults
        return array_merge($this->config->defaults,$unit);
    }

    /**
     * Converts a quantity to the dimension's base unit
     * @param float $quantity
     * @param array $unit
     * @param int   $direction
     * @return float 
     */
    private function _convertBase($quantity, array $unit, $direction = self::BASE_TO)
    {
        $factor   = $unit['factor'];
        $exponent = $unit['exponent'];
        $offset   = $unit['offset'];
        
        switch ($direction)
        {
            case self::BASE_FROM:
                return (float) ($quantity / ($factor * $exponent) + $offset);
                break;
            case self::BASE_TO:
            default:
                return (float) ($quantity * ($factor * $exponent) + $offset);
                break;
        }
    }
    
    /**
     * Convert's the current quantity to base
     * @return float
     */
    public function toBase()
    {
        return (float) $this->_convertBase($this->quantity, $this->unit);
    }
    
    /**
     * Converts the current quantity to another unit
     * @param string $unit
     * @return float
     * @throws QunitInvalidUnit 
     */
    public function to($unit)
    {
        // throw out on a bad unit
        if(!$this->_isUnit($unit)) {
            throw new QunitInvalidUnit;
        }
        
        // get the target unit definition
        $toUnit = $this->_getUnit($unit);
        
        // Convert quantity to base, then to the new unit
        return (float) $this->_convertBase($this->toBase(),$toUnit, self::BASE_FROM);
    }
    
    /**
     * Constructor
     * @param float  $quantity
     * @param string $unit
     * @param string $variant
     * @throws QunitInvalidUnit
     * @throws QunitInvalidQuantity 
     */
    public function __construct($quantity = 1, $unit = NULL, $variant = NULL)
    {
        $this->config   = new Config($this->config_file);
        $this->units    = $this->_getUnits();
        $this->baseUnit = $this->config->dimension['base_unit'];

        if(!$this->_isUnit($unit)) {
            throw new QunitInvalidUnit;
        }
        $this->unit     = $this->_getUnit($unit,$variant);
        
        if(!is_numeric($quantity)) {
            throw new QunitInvalidQuantity;
        }
        $this->quantity =  (float) $quantity;
    
        $this->base     = $this->_getUnit($this->config->dimension['base_unit']);
    }
}

?>
