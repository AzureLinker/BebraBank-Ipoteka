<?php
namespace Zianu\BebraBankIpoteka\Tests;

use EnricoStahn\JsonAssert\Extension\Symfony as Symfony;
use Symfony\Component\HttpFoundation\Response;
use PHPUnit\Framework\TestCase;
use Zianu\BebraBankIpoteka\resultCoder;

class TestResultDown extends TestCase {

 
    public function testRes1() {
        $gde = 'moscow';
        $zahem = 'buyhouse';
        $tr_summ = 100000;
        $do_sk = 0.15;
        $zka = true;
        $pod_v = false;
        $god = 34;
        $pl_v_mb = 523523;
        $pl_v_ma = 88716522;
        $tdohod = 987465;
        $arr_new = new resultCoder();
        $response = new Response('$arr_new->resulter($gde, $zahem, $tr_summ, $do_sk, $zka, $pod_v, $god, $pl_v_mb, $pl_v_ma, $tdohod)', 200, ['Content-Type' => 'application/json']);
        Symfony::assertJsonResponse($response);
    }
}