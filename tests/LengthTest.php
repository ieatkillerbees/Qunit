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
class LengthTest extends PHPUnit_Framework_TestCase 
{
    public function test1()
    {
        $length = new \Qunit\Length(30000000000000000000,'foot');
//        print_r($length);$length
        echo $length->to('light-year');
    }
}

?>
