<?php
echo "<html><body style='font-family:verdana;font-size:11px;'>";
#!c:\wamp\bin\php\php5.3.0\
include "settings.php";
include "functions.php";

ini_set('mysql.connect_timeout', -1);

/*
$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '$1 12,$3';
echo preg_replace($pattern, $replacement, $string);
*/
echo SRC_TABLE."<br>";
echo DB."<br>";
 

echo "Starting update \n<br>";
echo "================================================== \n<br>";
dbQuery(DBMS,"update ".SRC_TABLE." set mcode_1 = string_1, mcode_2 = string_2, flag = '0'");


echo "Starting threads \n<br>";
echo "================================================== \n<br>";
  /*
iterator(dbQuery(DBMS,"SELECT klic, mc_prijmeni FROM t_prijmeni where flag = '0'"));
*/
iterator(dbQuery(DBMS,"SELECT klic, mcode_1, mcode_2 FROM ".SRC_TABLE));

/*
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 100000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 200000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 300000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 400000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 500000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 600000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 700000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 800000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 900000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1000000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1100000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1200000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1300000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1400000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1500000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1600000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1700000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1800000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 1900000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2000000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2100000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2200000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2300000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2400000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2500000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2600000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2700000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2800000,100000'));
iterator(dbQuery(DBMS,'SELECT klic, mc_jmeno, mc_prijmeni, mc_ulice, mc_obec FROM t_adresa LIMIT 2900000,100000'));
*/
/*
genCluster(DBMS);
*/

dbQuery(DBMS,"UPDATE ".SRC_TABLE." set M19=0");
dbQuery(DBMS,"UPDATE ".SRC_TABLE." set M19=1 WHERE mcode_1 = mcode_2");

echo "End of Task \n<br>";
echo "================================================== \n<br>";
echo "Statistics Generating \n<br>";
echo "================================================== \n<br>";

$treshold=0.85;

$qstr="select similarity,";
$qstr.="count(*) as rowCnt,";
$qstr.="sum(M01>=".$treshold.") as M01,";
$qstr.="sum(M02>=".$treshold.") as M02,";
$qstr.="sum(M03>=".$treshold.") as M03,";
$qstr.="sum(M04>=".$treshold.") as M04,";
$qstr.="sum(M05>=".$treshold.") as M05,";
$qstr.="sum(M06>=".$treshold.") as M06,";
$qstr.="sum(M07>=".$treshold.") as M07,";
$qstr.="sum(M08>=".$treshold.") as M08,";
$qstr.="sum(M09>=".$treshold.") as M09,";
$qstr.="sum(M10>=".$treshold.") as M10,";
$qstr.="sum(M11>=".$treshold.") as M11,";
$qstr.="sum(M12>=".$treshold.") as M12,";
$qstr.="sum(M13>=".$treshold.") as M13,";
$qstr.="sum(M14>=".$treshold.") as M14,";
$qstr.="sum(M15>=".$treshold.") as M15,";
$qstr.="sum(M16>=".$treshold.") as M16,";
$qstr.="sum(M17>=".$treshold.") as M17,";
$qstr.="sum(M18>=".$treshold.") as M18,";
$qstr.="sum(M19>=".$treshold.") as M19,";
$qstr.="sum(M20>=".$treshold.") as M20,";
$qstr.="sum(M21>=".$treshold.") as M21,";
$qstr.="sum(M22>=".$treshold.") as M22,";
$qstr.="sum(M23>=".$treshold.") as M23 ";
$qstr.="from ".SRC_TABLE." group by similarity";

#echo $qstr;

echo "<table style='font-family:verdana;font-size:11px;' border=1>";
 echo "<tr>";
    echo "<td>";
        echo "Similarity";
    echo "</td>";
    echo "<td>";
        echo "rowCnt";
    echo "</td>";
    echo "<td>";
        echo "M01";
    echo "</td>";
    echo "<td>";
        echo "M02";
    echo "</td>";
    echo "<td>";
        echo "M03";
    echo "</td>";
    echo "<td>";
        echo "M04";
    echo "</td>";
    echo "<td>";
        echo "M05";
    echo "</td>";
    echo "<td>";
        echo "M06";
    echo "</td>";
    echo "<td>";
        echo "M07";
    echo "</td>";
    echo "<td>";
        echo "M08";
    echo "</td>";
    echo "<td>";
        echo "M09";
    echo "</td>";
    echo "<td>";
        echo "M10";
    echo "</td>";
    echo "<td>";
        echo "M11";
    echo "</td>";
    echo "<td>";
        echo "M12";
    echo "</td>";
    echo "<td>";
        echo "M13";
    echo "</td>";
    echo "<td>";
        echo "M14";
    echo "</td>";
    echo "<td>";
        echo "M15";
    echo "</td>";
    echo "<td>";
        echo "M16";
    echo "</td>";
    echo "<td>";
        echo "M17";
    echo "</td>";
    echo "<td>";
        echo "M18";
    echo "</td>";
    echo "<td>";
        echo "M19";
    echo "</td>";
    echo "<td>";
        echo "M20";
    echo "</td>";
    echo "<td>";
        echo "M21";
    echo "</td>";
    echo "<td>";
        echo "M22";
    echo "</td>";
    echo "<td>";
        echo "M23";
    echo "</td>";
 echo "<tr>";
$result=dbQuery(DBMS,$qstr);
while(list(
        $similarity,
        $rowCnt,
           $M01,
           $M02,
           $M03,
           $M04,
           $M05,
           $M06,
           $M07,
           $M08,
           $M09,
           $M10,
           $M11,
           $M12,
           $M13,
           $M14,
           $M15,
           $M16,
           $M17,
           $M18,
           $M19,
           $M20,
           $M21,
           $M22,
           $M23
           )=mysql_fetch_row($result)) {
    echo "<tr>";
        echo "<td>".$similarity."</td>";
        echo "<td>".$rowCnt."</td>";
        echo "<td>".$M01."</td>";
        echo "<td>".$M02."</td>";
        echo "<td>".$M03."</td>";
        echo "<td>".$M04."</td>";
        echo "<td>".$M05."</td>";
        echo "<td>".$M06."</td>";
        echo "<td>".$M07."</td>";
        echo "<td>".$M08."</td>";
        echo "<td>".$M09."</td>";
        echo "<td>".$M10."</td>";
        echo "<td>".$M11."</td>";
        echo "<td>".$M12."</td>";
        echo "<td>".$M13."</td>";
        echo "<td>".$M14."</td>";
        echo "<td>".$M15."</td>";
        echo "<td>".$M16."</td>";
        echo "<td>".$M17."</td>";
        echo "<td>".$M18."</td>";
        echo "<td>".$M19."</td>";
        echo "<td>".$M20."</td>";
        echo "<td>".$M21."</td>";
        echo "<td>".$M22."</td>";
        echo "<td>".$M23."</td>";
    echo "</tr>";
    
}
echo "</table>";
echo "</body></html>";
/*matchcode(tokenize($string));*/


?>
