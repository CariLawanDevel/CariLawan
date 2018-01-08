<?php

class LongLatConverterTest extends PHPUnit_Framework_TestCase {
 
    public function testLongLat()
    {
    	include 'function_long_lat.php';

        $this->assertEquals('-6.9314479', getLatitude('Lapangan Voli UIN Bandung'));
        $this->assertEquals('107.7187381', getLongitude('Lapangan Voli UIN Bandung'));
        $this->assertEquals('-6.927459', getLatitude('Pondok Pesantren Mahasiswa Universal Bandung'));
        $this->assertEquals('107.717064', getLongitude('Pondok Pesantren Mahasiswa Universal Bandung'));
    }
}

?>