<?
/**
 * Qunit
 * 
 * @package   Qunit 
 * @author    Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright 2012 Samantha Quinones
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD License
 */

namespace Qunit;

define('CONFIG_DIR',dirname(__FILE__)."/config/");

// Simple autoloader
function loader($class)
{
    $class   = basename(str_replace("\\","/",$class));
    $classes = array(
        'Config'    => '/classes/Config.php',
        'Converter' => '/classes/Converter.php',
        'Length'    => '/classes/Length.php',
        'Qunit'     => '/classes/Qunit.php',
        'QunitInvalidUnit'=> '/classes/QunitException.php',
        'QunitInvalidQuantity'=> '/classes/QunitException.php',
        'QunitPropertyException'=> '/classes/QunitException.php'
    );
    require(dirname(__FILE__).$classes[$class]);
}

spl_autoload_register('\Qunit\loader');