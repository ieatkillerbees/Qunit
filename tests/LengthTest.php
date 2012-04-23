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
        $yards = new Length(200,'yard');
        echo "\nYARDS: {$yards->quantity}";
        
        $feet = $yards->toFoot('us');
        echo "\nFEET: {$feet->quantity}";
        
        $meters = $feet->toMeter();
        echo "\nMETERS: {$meters->quantity}";
        
        $lightsecs = $feet->toLightSecond();
        echo "\nLIGHT-SECS: {$lightsecs->quantity}";
               
        echo "\nKM: {$meters->toFactor('kilo')}";
        echo "\nMM: {$meters->toFactor('milli')}";
        
    }
}

?>
