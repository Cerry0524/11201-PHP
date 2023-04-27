<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
    .container{
        display: flex;
        flex-direction: column;
        flex-basis: 100%;
    }
    .week{
        flex-basis: 15%;
        background-color: lightcyan;
        border: 1px solid black;
        height: 80px;

        display: flex;
        margin: 0px 0px;
    }
    .week:nth-child(odd){
        background-color: lightblue;
    }
    .title{
        font-size: 30px;
        text-align: center;
        padding: 20px 20px;
        height: 40px;
    }
    .day{
        font-size: 30px;
    }
    .week>.rest{
        background-color: pink;
    }
    .week>.day>.key{
        color:red;
        text-shadow: 2px 2px 4px gray;
        
    }
   input{
    font-size: 40px;
   }
</style>
</head>


<body>
<br>
<br>
<!-- <label for="month">
   <div>
       <input type="month" name="month" id="month" value="2023-01" min="2023-01" max="2023-12">
       <input type="submit" value="確認">
    </div>   
</label>
<br>
<br> -->

<?php
date_default_timezone_set('Asia/Taipei');

$month=$_GET['month']??date("n");
// (isset($_GET['month']))?$_GET['month']:date("n");
$year=$_GET['year']??date("Y");

$firstDateTime=strtotime(date("$year-$month-1"));
$day=date("t",$firstDateTime);
$finalDateTime=strtotime("$year-$month-$day");

$firstDateWeek=date("w",$firstDateTime);
$finalDateWeek=date("w",$finalDateTime);
$weeks= ceil(($firstDateWeek+$day)/7);
$firstWeekSpace=$firstDateWeek-1;



$holiday[1][1]="中華民國開國紀念日";
$holiday[1][2]="補假";
$holiday[1][8]="例假日";
$holiday[1][14]="例假日";
$holiday[1][15]="例假日";
$holiday[1][20]="調整放假";
$holiday[1][21]="農曆除夕";
$holiday[1][22]="春節";
$holiday[1][23]="春節";
$holiday[1][24]="春節";
$holiday[1][25]="補假";
$holiday[1][26]="補假";
$holiday[1][27]="調整放假";
$holiday[1][28]="例假日";
$holiday[1][29]="例假日";
$holiday[2][5]="例假日";
$holiday[2][11]="例假日";
$holiday[2][12]="例假日";
$holiday[2][19]="例假日";
$holiday[2][25]="例假日";
$holiday[2][26]="例假日";
$holiday[2][27]="調整放假";
$holiday[2][28]="和平紀念日";
$holiday[3][4]="例假日";
$holiday[3][5]="例假日";
$holiday[3][11]="例假日";
$holiday[3][12]="例假日";
$holiday[3][18]="例假日";
$holiday[3][19]="例假日";
$holiday[3][26]="例假日";
$holiday[4][1]="例假日";
$holiday[4][2]="例假日";
$holiday[4][3]="調整放假";
$holiday[4][4]="兒童節";
$holiday[4][5]="民族掃墓節";
$holiday[4][8]="例假日";
$holiday[4][9]="例假日";
$holiday[4][15]="例假日";
$holiday[4][16]="例假日";
$holiday[4][22]="例假日";
$holiday[4][23]="例假日";
$holiday[4][29]="例假日";
$holiday[4][30]="例假日";
$holiday[5][6]="例假日";
$holiday[5][7]="例假日";
$holiday[5][13]="例假日";
$holiday[5][14]="例假日";
$holiday[5][20]="例假日";
$holiday[5][21]="例假日";
$holiday[5][27]="例假日";
$holiday[5][28]="例假日";
$holiday[6][3]="例假日";
$holiday[6][4]="例假日";
$holiday[6][10]="例假日";
$holiday[6][11]="例假日";
$holiday[6][18]="例假日";
$holiday[6][22]="端午節";
$holiday[6][23]="調整放假";
$holiday[6][24]="例假日";
$holiday[6][25]="例假日";
$holiday[7][1]="例假日";
$holiday[7][2]="例假日";
$holiday[7][8]="例假日";
$holiday[7][9]="例假日";
$holiday[7][15]="例假日";
$holiday[7][16]="例假日";
$holiday[7][22]="例假日";
$holiday[7][23]="例假日";
$holiday[7][29]="例假日";
$holiday[7][30]="例假日";
$holiday[8][5]="例假日";
$holiday[8][6]="例假日";
$holiday[8][12]="例假日";
$holiday[8][13]="例假日";
$holiday[8][19]="例假日";
$holiday[8][20]="例假日";
$holiday[8][26]="例假日";
$holiday[8][27]="例假日";
$holiday[9][2]="例假日";
$holiday[9][3]="例假日";
$holiday[9][9]="例假日";
$holiday[9][10]="例假日";
$holiday[9][16]="例假日";
$holiday[9][17]="例假日";
$holiday[9][24]="例假日";
$holiday[9][29]="中秋節";
$holiday[9][30]="例假日";
$holiday[10][1]="例假日";
$holiday[10][7]="例假日";
$holiday[10][8]="例假日";
$holiday[10][9]="調整放假";
$holiday[10][10]="國慶日";
$holiday[10][14]="例假日";
$holiday[10][15]="例假日";
$holiday[10][21]="例假日";
$holiday[10][22]="例假日";
$holiday[10][28]="例假日";
$holiday[10][29]="例假日";
$holiday[11][4]="例假日";
$holiday[11][5]="例假日";
$holiday[11][11]="例假日";
$holiday[11][12]="例假日";
$holiday[11][18]="例假日";
$holiday[11][19]="例假日";
$holiday[11][25]="例假日";
$holiday[11][26]="例假日";
$holiday[12][2]="例假日";
$holiday[12][3]="例假日";
$holiday[12][9]="例假日";
$holiday[12][10]="例假日";
$holiday[12][16]="例假日";
$holiday[12][17]="例假日";
$holiday[12][23]="例假日";
$holiday[12][24]="例假日";
$holiday[12][30]="例假日";
$holiday[12][31]="例假日";

if($month==1){
    $prevYear=$year-1;
    $prevMonth=12;
}else{
    $prevYear=$year;
    $prevMonth=$month-1;
}

if($month==12){
    $nextYear=$year+1;
    $nextMonth=1;
}else{
    $nextYear=$year;
    $nextMonth=$month+1;
}

?>

<div>
<a href="calendar.php?year=<?=$prevYear;?>&month=<?=$prevMonth;?>"><?=$prevMonth;?>月</a>

<span><?=$month;?>月</span>

<a href="calendar.php?year=<?=$nextYear;?>&month=<?=$nextMonth;?>"><?=$nextMonth;?>月</a>
</div>

<div class='container'>
<div class='week'>
<div class='week title'>日</div>
<div class='week title'>一</div>
<div class='week title'>二</div>
<div class='week title'>三</div>
<div class='week title'>四</div>
<div class='week title'>五</div>
<div class='week title'>六</div>
</div>

<?php
for ($i=0; $i < $weeks ; $i++) { 
    
    echo "<div class='week'>";
    
    for ($j=0; $j < 7; $j++) {    

        echo "<div class='week day ";
        
        echo ($holiday[$month][$j+$i*7-$firstWeekSpace]!=null)?"rest'>":"'>";
        
        echo (($i==0  && $j < $firstDateWeek)||( $i==$weeks-1 && $j > $firstDateWeek))?"&nbsp":($j+$i*7-$firstWeekSpace);
        
        foreach ($holiday as $keyM => $holidayM) {
            
            if($month==$keyM){
                
                foreach ($holidayM as $keyD => $holidayD){
                    
                    echo "<div class='key'>";
                    echo ($keyD==$j+$i*7-$firstWeekSpace)?$holiday[$month][$keyD]:"";
                    echo "</div>";
                }
                echo "</div>";   

        }
    }
        
    }
    echo "</div>";
}
echo "</div>";
?>
    
    </body>
</html>



