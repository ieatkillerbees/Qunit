<?
/**
 * Qunit
 * 
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License
 */

namespace Qunit\core;

define('CONFIG_DIR',dirname(__FILE__)."/config/");

// Simple autoloader
function loader($class)
{
    $class   = basename(str_replace("\\","/",$class));
    $classes = array(
        'Config'                => 'core/Config.php',
        'Converter'             => 'core/Converter.php',
        'Qunit'                 => 'core/Qunit.php',
        'QunitInvalidUnit'      => 'core/QunitException.php',
        'QunitInvalidQuantity'  => 'core/QunitException.php',
        'QunitPropertyException'=> 'core/QunitException.php',
        'Length'                => 'dimensions/Length.php',
    );
    require(dirname(__FILE__).'/classes/'.$classes[$class]);
}

spl_autoload_register('\Qunit\core\loader');