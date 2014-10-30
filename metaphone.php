<?php

include "settings.php";
include "functions.php";

$result=dbQuery(DBMS,"select klic, string_1, string_2 from ds001");

while(list($klic,$str1,$str2)=mysql_fetch_row($result)) {
        
        $qstr="update ds001 set string_1_M23='".metaphone($str1)."', string_2_M23='".metaphone($str2)."' where klic=".$klic;
        echo "str1: ".$str1." str2: ".$str2."qstr: ".$qstr."<br>";
        mysql_query($qstr);
        
        if ($str1 == $str2) {
                $res=1;
            }
            else {
                $res=0;
            }
        
        mysql_query("update ds001 set M23=".$res." where klic=".$klic);
        
}


?>