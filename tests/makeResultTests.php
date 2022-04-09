<?php
namespace Zianu\BebraBankIpoteka\Tests;

use PHPUnit\Framework\TestCase;
use Zianu\BebraBankIpoteka\resultCount;

class makeResultTests extends TestCase {
 
    public function testStub1() {
        $tr_summ = 100000;
        $perv_v = 60000;
        $do_sk = 0.15;
        $god = 12;
        $half_god = 6;
        $summ_new = new resultCount();
        self::assertEquals($summ_new->countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god), [40000, 6000, 46000, 3834, 15834, 1000, 2059, 2834]);
    }
    public function testStub2() {
        $tr_summ = 146000000;
        $perv_v = 60000;
        $do_sk = 0.01;
        $god = 60;
        $half_god = 30;
        $summ_new = new resultCount();
        self::assertEquals($summ_new->countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god), [145940000, 1459400, 147399400, 2456657, 2468657, 48647, 320926, 2408010]);
    }
    public function testStub3() {
        $tr_summ = 560000;
        $perv_v = 120000;
        $do_sk = 0.55;
        $god = 23;
        $half_god = 12;
        $summ_new = new resultCount();
        self::assertEquals($summ_new->countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god), [440000, 242000, 682000, 29653, 41653, 20167, 5415, 9486]);
    }
    public function testStub4() {
        $tr_summ = 146000;
        $perv_v = 100000;
        $do_sk = 1.54;
        $god = 45;
        $half_god = 23;
        $summ_new = new resultCount();
        self::assertEquals($summ_new->countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god), [46000, 70840, 116840, 2597, 14597, 3080, 1898, -483]);
    }
    public function testStub5() {
        $tr_summ = 200000;
        $perv_v = 70000;
        $do_sk = 0.06;
        $god = 60;
        $half_god = 30;
        $summ_new = new resultCount();
        self::assertEquals($summ_new->countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god), [130000, 7800, 137800, 2297, 14297, 260, 1859, 2037]);
    }
    public function testStub6() {
        $tr_summ = 10000000;
        $perv_v = 100000;
        $do_sk = 1.54;
        $god = 18;
        $half_god = 9;
        $summ_new = new resultCount();
        self::assertEquals($summ_new->countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god), [9900000, 15246000, 25146000, 1397000, 1409000, 1694000, 183170, -297000]);
    }
}