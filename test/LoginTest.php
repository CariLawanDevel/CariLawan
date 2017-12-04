<?php

class LoginTest extends PHPUnit_Framework_TestCase {
 
    public function testLogin(){
    	include '../db_function.php';
        $this->assertEquals(1, login("aku","aku"));
    }
}

?>