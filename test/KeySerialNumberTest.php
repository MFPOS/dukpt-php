<?php

require_once __DIR__ . '/../src/KeySerialNumber.php';
require_once __DIR__ . '/../src/DerivedKey.php';

class KeySerialNumberTest extends PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $ksn = "0123456789321987";
        $key = new KeySerialNumber($ksn);
        $this->assertEquals("FFFF012345678920", $key->getBaseKeyId());
    }

    public function testDeriveInitialKey()
    {
        $bdk = '0123456789ABCDEFFEDCBA9876543210';
        $ksn = 'FFFF9876543210E00000';

        $ksnObj = new KeySerialNumber($ksn);
        $ksnObj->calculateIpek($bdk);

        $this->assertEquals('6AC292FAA1315B4D858AB3A3D7D5933A', $ksnObj->getInitialKey());
    }

}
