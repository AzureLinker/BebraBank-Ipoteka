<?php

function make_line($n, $pl_v_ma, $sk_v_m, $pl_v_dg, $skidka, $god, $half_god){
    $half_god = ceil($god / 2);
    for($i=0; $i < $god;$i++){
        $skidka = ($skidka - $sk_v_m);
        $sk_v_m = ceil($skidka / $half_god);
        if($sk_v_m >= $pl_v_ma){$sk_v_m = $pl_v_ma;}
        $n = $n + 1;
        if($sk_v_m <=0){$sk_v_m = 0;}
        $pl_v_dg = $pl_v_ma - $sk_v_m;
        if($pl_v_dg <= 0){$pl_v_dg = 0;}
        echo "<tr>"; 
        echo "<td>{$n}</td>"; 
        echo "<td>{$pl_v_ma} ₽</td>"; 
        echo "<td>{$sk_v_m} ₽</td>"; 
        echo "<td>{$pl_v_dg} ₽</td>"; 
        echo "</tr>";
        if($sk_v_m <= $pl_v_ma){$sk_v_m = $pl_v_ma;}
    }
}