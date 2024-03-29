<style>
    .calendar {
        display: flex;
        flex-wrap: wrap;
        width: 70%;
        margin-left: 1px;
        margin-top: 1px;
    }

    .calendar>div {
        width: calc(100%/7);
        border: 1px solid black;
        box-sizing: border-box;
        margin-left: -1px;
        margin-top: -1px;
        background-color: lightblue;
    }

    .calendar>.holiday {
        background-color: pink;

        display: flex;
        flex-direction: column;
    }
    .Day{
        display: flex;
    }
    .dDay {
        /* background-color: lightgray; */
        flex-basis: 30%;
        display: flex;
    }

    .hDay {
        /* background-color: lightsalmon; */
        flex-basis: 70%;
        color: red;
        text-shadow: 2px 2px 2px gray;
        text-align: right;
        font-size: 10px;
    }
    .pointL{
        color: red;
        text-shadow: 2px 2px 4px pink;
        font-size: larger;
    }
    .pointR{
        color: red;
        text-shadow: 2px 2px 4px pink;
        font-size: larger;
    }
</style>

<?php
$month = $_GET['month'] ?? date("n");
$year = $_GET['year'] ?? date("Y");
$firstDayTime = strtotime("$year-$month-1");
$days = date("t", $firstDayTime);
$finalDayTime = strtotime("$year-$month-$days");
$firstDayWeek = date("w", $firstDayTime);
$finalDayWeek = date("w", $finalDayTime);
$weeks = ceil(($firstDayWeek + $days) / 7);
$firstWeekSpace = $firstDayWeek - 1;

$cal = [];
$holiday = [];

$holiday = [
    "2023-1-1" => "中華民國開國紀念日",
    "2023-1-2" => "補假",
    // "2023-1-7"=>"補行上班",
    "2023-1-8" => "例假日",
    "2023-1-14" => "例假日",
    "2023-1-15" => "例假日",
    "2023-1-20" => "調整放假",
    "2023-1-21" => "農曆除夕",
    "2023-1-22" => "春節",
    "2023-1-23" => "春節",
    "2023-1-24" => "春節",
    "2023-1-25" => "補假",
    "2023-1-26" => "補假",
    "2023-1-27" => "調整放假",
    "2023-1-28" => "例假日",
    "2023-1-29" => "例假日",
    // "2023-2-4"=>"補行上班",
    "2023-2-5" => "例假日",
    "2023-2-11" => "例假日",
    "2023-2-12" => "例假日",
    "2023-2-18" => "補行上班",
    "2023-2-19" => "例假日",
    "2023-2-25" => "例假日",
    "2023-2-26" => "例假日",
    "2023-2-27" => "調整放假",
    "2023-2-28" => "和平紀念日",
    "2023-3-4" => "例假日",
    "2023-3-5" => "例假日",
    "2023-3-11" => "例假日",
    "2023-3-12" => "例假日",
    "2023-3-18" => "例假日",
    "2023-3-19" => "例假日",
    // "2023-3-25"=>"補行上班",
    "2023-3-26" => "例假日",
    "2023-4-1" => "例假日",
    "2023-4-2" => "例假日",
    "2023-4-3" => "調整放假",
    "2023-4-4" => "兒童節",
    "2023-4-5" => "民族掃墓節",
    "2023-4-8" => "例假日",
    "2023-4-9" => "例假日",
    "2023-4-15" => "例假日",
    "2023-4-16" => "例假日",
    "2023-4-22" => "例假日",
    "2023-4-23" => "例假日",
    "2023-4-29" => "例假日",
    "2023-4-30" => "例假日",
    "2023-5-6" => "例假日",
    "2023-5-7" => "例假日",
    "2023-5-13" => "例假日",
    "2023-5-14" => "例假日",
    "2023-5-20" => "例假日",
    "2023-5-21" => "例假日",
    "2023-5-27" => "例假日",
    "2023-5-28" => "例假日",
    "2023-6-3" => "例假日",
    "2023-6-4" => "例假日",
    "2023-6-10" => "例假日",
    "2023-6-11" => "例假日",
    // "2023-6-17"=>"補行上班",
    "2023-6-18" => "例假日",
    "2023-6-22" => "端午節",
    "2023-6-23" => "調整放假",
    "2023-6-24" => "例假日",
    "2023-6-25" => "例假日",
    "2023-7-1" => "例假日",
    "2023-7-2" => "例假日",
    "2023-7-8" => "例假日",
    "2023-7-9" => "例假日",
    "2023-7-15" => "例假日",
    "2023-7-16" => "例假日",
    "2023-7-22" => "例假日",
    "2023-7-23" => "例假日",
    "2023-7-29" => "例假日",
    "2023-7-30" => "例假日",
    "2023-8-5" => "例假日",
    "2023-8-6" => "例假日",
    "2023-8-12" => "例假日",
    "2023-8-13" => "例假日",
    "2023-8-19" => "例假日",
    "2023-8-20" => "例假日",
    "2023-8-26" => "例假日",
    "2023-8-27" => "例假日",
    "2023-9-2" => "例假日",
    "2023-9-3" => "例假日",
    "2023-9-9" => "例假日",
    "2023-9-10" => "例假日",
    "2023-9-16" => "例假日",
    "2023-9-17" => "例假日",
    // "2023-9-23"=>"補行上班",
    "2023-9-24" => "例假日",
    "2023-9-29" => "中秋節",
    "2023-9-30" => "例假日",
    "2023-10-1" => "例假日",
    "2023-10-7" => "例假日",
    "2023-10-8" => "例假日",
    "2023-10-9" => "調整放假",
    "2023-10-10" => "國慶日",
    "2023-10-14" => "例假日",
    "2023-10-15" => "例假日",
    "2023-10-21" => "例假日",
    "2023-10-22" => "例假日",
    "2023-10-28" => "例假日",
    "2023-10-29" => "例假日",
    "2023-11-4" => "例假日",
    "2023-11-5" => "例假日",
    "2023-11-11" => "例假日",
    "2023-11-12" => "例假日",
    "2023-11-18" => "例假日",
    "2023-11-19" => "例假日",
    "2023-11-25" => "例假日",
    "2023-11-26" => "例假日",
    "2023-12-2" => "例假日",
    "2023-12-3" => "例假日",
    "2023-12-9" => "例假日",
    "2023-12-10" => "例假日",
    "2023-12-16" => "例假日",
    "2023-12-17" => "例假日",
    "2023-12-23" => "例假日",
    "2023-12-24" => "例假日",
    "2023-12-30" => "例假日",
    "2023-12-31" => "例假日",
];


for ($i = 0; $i < $weeks; $i++) {
    for ($j = 0; $j < 7; $j++) {
        $cal[] = (($i == 0 && $j < $firstDayWeek) || (($i == $weeks - 1) && $j > $finalDayWeek)) ? '&nbsp' : ("$year-$month-" . ($j + $i * 7 - $firstWeekSpace));
    }
}

echo $today=date("Y-n-j");
echo "<div class='calendar'>";//1
for ($i = 0; $i < count($cal); $i++) {
    
    $day = ($cal[$i] != "&nbsp") ? explode("-", $cal[$i])[2] : "&nbsp";
    
    
    if (isset($holiday[$cal[$i]])) {
        echo "<div class='holiday'>";//2

        echo "<div class='dDay'>";//3
            echo ($today==($cal[$i]))?"<div class='pointL'>":"";
            echo $day."</div>";

            echo ($today==($cal[$i]))?"<div class='pointR'>●</div>":"";

        echo "<div class='hDay'>" . $holiday[$cal[$i]]. "</div>";

        echo "</div>";
    } else {
        echo "<div class='Day'>";//2
        
        echo ($today==($cal[$i]))?"<div class='pointL'>":"";//3
        echo $day;
        echo ($today==($cal[$i]))?"</div><div class='pointR'>●</div></div>":"";//3
       
    }
   
    echo "</div>";//2
}
echo "</div>";//1

$prevMonth = ($month == 1) ? 12 : $month - 1;
$prevYear = ($month == 1) ? $year - 1 : $year;
$nextMonth = ($month == 12) ? 1 : $month + 1;
$nextYear = ($month == 12) ? $year + 1 : $year;

?>
<a href="calendar01.php?year=<?= $prevYear; ?>&month=<?= $prevMonth; ?>"><?= $prevMonth ?>月</a>
<span><?= $month; ?>月</span>
<a href="calendar01.php?year=<?= $nextYear; ?>&month=<?= $nextMonth; ?>"><?= $nextMonth ?>月</a>