<?php
namespace Zianu\BebraBankIpoteka;

class resultCount{

    public function countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god){
        $summ_op = ($tr_summ - $perv_v); // сумма без первоначального взноса
        $skidka = $summ_op * $do_sk; // сколько надо добавить
        $pl_v_mb = $summ_op + $skidka; // сумма с программой
        $pl_v_m = ceil($pl_v_mb / $god); // плата в месяц
        $pl_v_ma = ceil($pl_v_m); // плата в месяц, округлено
        $tdohod = $pl_v_ma + 12000; // необходимый доход
        $sk_v_m = ceil($skidka / $half_god); //погашение налога в месяц
        $nalog_vichet = ceil($tdohod * 0.13); // налоговый вычет
        $pl_v_dg = $pl_v_ma - $sk_v_m;

        return [$summ_op, $skidka, $pl_v_mb, $pl_v_ma, $tdohod, $sk_v_m, $nalog_vichet, $pl_v_dg];
    }

}