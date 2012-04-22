<?php
/**
 * QunitException.php
 * 
 * Qunit exception handlers
 * @package Qunit.core
 * @author     Samantha Quinones <ieatkillerbees@gmail.com>
 * @copyright  2012 Samantha Quinones
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD License 
 */

namespace Qunit\core;

/**
 * QunitPropertyException
 * @package Qunit.core 
 */
class QunitPropertyException extends \Exception 
{
    /**
     * constructor 
     */
    public function __construct()
    {
        $this->message = "[{$this->file}:{$this->line}] Attempted to access undefined property.";
        parent::__construct();
    }
}

/**
 * QunitInvalidUnit
 * @package Qunit.core 
 */
class QunitInvalidUnit extends \Exception
{
    /**
     * constructor 
     */
    public function __construct()
    {
        $this->message = "[{$this->file}:{$this->line}] Invalid unit reference.\n".$this->getTraceAsString()."\n";
    }
}

/**
 * QunitInvalidQuantity
 * @package Qunit.core 
 */
class QunitInvalidQuantity extends \Exception
{
    /**
     * constructor 
     */
    public function __construct()
    {
        $this->message = "[{$this->file}:{$this->line}] Non-numeric quantity given.\n".$this->getTraceAsString()."\n";
    }
}