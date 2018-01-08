<?php

class KalkulatorTest extends PHPUnit_Framework_TestCase {
 
    public function testKalkulator()
    {
    	include 'Kalkulator.php';
        $this->assertEquals(444, tambah(123,321));
        $this->assertEquals(80, kurang(100,20));
        $this->assertEquals(49, kali(7,7));
        $this->assertEquals(25, bagi(125,5));
    }
}

?>