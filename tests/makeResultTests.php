<?php

use PHPUnit\Framework\TestCase;
use AzureLink\makeResult\resultCount;

class makeResultTests extends TestCase{
    public function defaultTest(){
        $love = true;
        self::assertTrue($love); 
    }
    public function array_right_Count(){
        $countArray = new resultCount(100000, 60000, 0.15, 12, 6);
        $this->assertEquals($countArray->countNumbers(), [40000, 6000, 46000, 3833, 15833, 1000, 2058, 2833]);
    }
}