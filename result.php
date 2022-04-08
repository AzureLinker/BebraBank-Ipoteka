<?php
require './src/TableMaker.php';
require './src/resultCount.php';
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
$results = new resultCount.countNumbers($tr_summ, $perv_v, $do_sk, $god, $half_god);
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
                <div class="link middle-link"><a class="Link__BTN" href="dowld.php">Сохранить результат</a></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>2021-2022. Carnival Night Zone(C). БебраБанк - торговая марка, принадлежащая Carnival Night Zone.</p>
    </div>
</body>
</html>