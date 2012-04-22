<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Qunit;
/**
 * Description of QException
 *
 * @author samantha
 */
class QunitPropertyException extends \Exception 
{
    public function __construct()
    {
        $this->message = "[{$this->file}:{$this->line}] Attempted to access undefined property.";
        parent::__construct();
    }
}

class QunitInvalidUnit extends \Exception
{
    public function __construct()
    {
        $this->message = "[{$this->file}:{$this->line}] Invalid unit reference.\n".$this->getTraceAsString()."\n";
    }
}

class QunitInvalidQuantity extends \Exception
{
    public function __construct()
    {
        $this->message = "[{$this->file}:{$this->line}] Non-numeric quantity given.\n".$this->getTraceAsString()."\n";
    }
}

?>
