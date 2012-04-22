<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require("Qunit.php");
/**
 * Description of LengthTest
 *
 * @author samantha
 */
use \Qunit\dimensions\Length as Length;
class LengthTest extends PHPUnit_Framework_TestCase 
{
    public function test1()
    {
        $length = new Length(30000000000000000000,'foot');
//        print_r($length);$length
//        echo $length->to('light-year');
    }
        
    
    public function testSi()
    {
        $length = new Length(2000,'meter');
        echo $length->toFactor('exa');
    }
}

?>
