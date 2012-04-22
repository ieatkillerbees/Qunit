<?php
/**
 * \Qunit\Config 
 * Configuration object to handle config (ini) files.
 * 
 * @package    Qunit
 * @subpackage Config
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License
 */

namespace Qunit;
/**
 * Magic Properties
 * @property dimension
 */
class Config extends Qunit
{
    /**
     * Returns an array of configuration sections
     * @return array
     */
    public function getSections()
    {
        return array_keys($this->_properties);
    }

    /**
     * Config constructor
     * @param Converter $converter 
     */
    public function __construct($config_file)
    {
        $this->_properties = parse_ini_file(CONFIG_DIR . $config_file ,TRUE);
    }
}