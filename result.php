<?php
$tr_summ = $_POST['tr_summ']; // Сколько надо
$perv_v = $_POST['perv_v']; // Первоначально
if($perv_v > $tr_summ){
    header('Location: /error.php');
}
$god = $_POST['god']; // Сколько месяцев
$half_god = ceil($god / 2); // Половина срока
$do_sk = $_POST['do_sk']; // Скидка
$zka = $_POST['zka']; // Есть ли зарплатная карта
$pod_v = $_POST['dohod']; // Подтверждённый ли доход
if($zka == 'true') {
    $do_sk = $do_sk - 0.05; // если есть зарплатная, то прибавить скидку на 5%
    if($do_sk < 0){
        $do_sk = 0; // Если скидка меньше нуля, то она равна 0%
    } 
}
if($pod_v == 'true') {
    $do_sk = $do_sk + 0.08; // если подтверждённый доход, то убавить скидку на 8%
    if($do_sk < 0){
        $do_sk = 0; // Если скидка меньше нуля, то она равна 0%
    } 
}
$zahem = $_POST['creditgoal']; // цель кредита
$gde = $_POST['buyregion']; // регион
$n = 0;
$summ_op = ($tr_summ - $perv_v); // сумма без первоначального взноса
$skidka = $summ_op * $do_sk; // сколько надо добавить
$pl_v_mb = $summ_op + $skidka; // сумма с программой
$pl_v_m = ceil($pl_v_mb / $god); // плата в месяц
$pl_v_ma = ceil($pl_v_m); // плата в месяц, округлено
$tdohod = $pl_v_ma + 12000; // необходимый доход
$sk_v_m = ceil($skidka / $half_god); //погашение налога в месяц
$nalog_vichet = ceil($tdohod * 0.13); // налоговый вычет
$pl_v_dg = $pl_v_ma - $sk_v_m;
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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>БебраБанк | Ипотека</title>
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu+Mono:wght@400;700&display=swap');
    </style>
</head>
<body>
    <div class="header">
        <div class="header__logo">
            <img src="img/png/logo.png" alt="Логотип">
            <div class="header__text">БебраБанк</div>
        </div>
    </div>
    <div class="body">
        <div class="result__table">
            <p class="result-text">Результат обработки:
                <br>
                <a class="Link__BTN" href="index.html">Назад</a>
            </p>
            <table class="result__table__result">
                <tr>
                    <td>Ежемесячный платёж:</td>
                    <td><?echo $pl_v_ma?> ₽</td>
                </tr>
                <tr>
                    <td>Процентная ставка:</td>
                    <td><?echo $do_sk * 100?>%</td>
                </tr>
                <tr>
                    <td>Сумма кредита:</td>
                    <td><?echo $summ_op?> ₽</td>
                </tr>
                <tr>
                    <td>Налоговый вычет:</td>
                    <td><?echo $nalog_vichet?> ₽</td>
                </tr><tr>
                    <td>Необходимый доход:</td>
                    <td><?echo $tdohod?> ₽</td>
                </tr>
            </table>
            <p class="result-text">Ежемесячный платёж по месяцам:</p>
            <table class="result__table__months">
                <tr>
                    <th>Месяц</th>
                    <th>Платёж</th>
                    <th>Погашение налога</th>
                    <th>Погашение долга</th>
                </tr>
                <?echo make_line($n, $pl_v_ma, $sk_v_m, $pl_v_dg, $skidka, $god, $half_god)?>
            </table>
            <div class="buttons">
                <div class="link middle-link"><a class="Link__BTN" href="">Подать заявку</a></div>
                <div class="link middle-link"><a class="Link__BTN" href="/src/resultCoder.php">Сохранить результат</a></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>2021-2022. Carnival Night Zone(C). БебраБанк - торговая марка, принадлежащая Carnival Night Zone.</p>
    </div>
</body>
</html>