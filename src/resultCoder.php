<?php
namespace Zianu\BebraBankIpoteka;

class resultCoder{
    public function resulter( $gde, $zahem, $tr_summ, $do_sk, $zka, $pod_v, $god, $pl_v_mb, $pl_v_ma, $tdohod){
        $test_ar = array(
        'gde' => $gde,
        'zahem' => $zahem,
        'trebuemaya summa' => $tr_summ,
        'nalog' => $do_sk * 100,
        'zarplatnaya karta' => $zka,
        'podtverjdennyi dohod' => $pod_v,
        'mesacev' => $god,
        'summa s nalogom' => $pl_v_mb,
        'plata v mesac' => $pl_v_ma,
        'neobhodimyi dohod' => $tdohod,
        );
        $wrte = json_encode($test_ar);
        $fp = fopen("result.json", "w");
        fwrite($fp, $wrte);
        fclose($fp);
    }
}