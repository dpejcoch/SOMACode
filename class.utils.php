<?php

class Utils {
  
  function __construct(){}
  
  public function Iterator($table){
    $qstr = 'SELECT COUNT(*) FROM $table';
    $res = $this->MyDirQuery($qstr);
    list($cnt) = mysql_fetch_row($res);
    for($i = 1; $i <= $cnt; $i++){
      
    }
  }
  
  
}

?>