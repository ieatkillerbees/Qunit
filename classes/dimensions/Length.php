<?php
/**
 * Length.php
 * 
 * Class definition for the Length dimension.
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License 
 * @package Qunit.dimensions 
 */
namespace Qunit\dimensions;

/**
 * Length - Qunit dimension for length measurements.
 * @package Qunit.dimensions
 */
class Length extends \Qunit\core\Converter
{
    /**
     * Dimension configuration file.
     * @var string  
     */
    public $config_file = 'Length.ini';
}