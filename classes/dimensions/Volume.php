<?php
/**
 * Volume.php
 * 
 * Class definition for the Volume dimension.
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License 
 * @package Qunit.dimensions 
 */
namespace Qunit\dimensions;

/**
 * Volume - Qunit dimension for Volume measurements.
 * @package Qunit.dimensions
 */
class Volume extends \Qunit\core\Converter
{
    /**
     * Dimension configuration file.
     * @var string  
     */
    public $config_file = 'Volume.ini';
}