<?php
$month=$_GET['month']??date("n");    //取得當前的月份
$year=$_GET['year']??date("Y"); //取得年份;
$firstDateTime=strtotime("$year-$month-1");    //取得當前月份第一天
$days=date("t",$firstDateTime);     //取得當前月份的總天數
$finalDateTime=strtotime("$year-$month-$days");    //取得當前月份最後一天
$firstDateWeek=date("w",$firstDateTime); //取得當前月份第一天的星期
$finalDateWeek=date("w",$finalDateTime); //取得當前月份最後一天的星期
$weeks=ceil(($days+$firstDateWeek)/7);  //計算當前月份的天數會佔幾周
$firstWeekSpace=$firstDateWeek-1;       //計算當前月份第一周的空白日(或前一個月份佔幾天)
$days=[];

//使用迴圈來畫出當前月的周數
for($i=0;$i<$weeks;$i++){
    //使用迴圈來畫出當周的天數
    for($j=0;$j<7;$j++){
        //判斷當周是否為第一周或最後一周
        if(($i==0 && $j<$firstDateWeek) || (($i==$weeks-1) && $j>$finalDateWeek)){
            $days[]='&nbsp';
        }else{
            $days[]=$j+7*$i-$firstWeekSpace;
        }
    }
}


for($i=0;$i<count($days);$i++){
    echo "<div> {$days[$i]} </div>";
}