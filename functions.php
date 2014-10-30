<?php

function lowcase($string) {
  $vystup = mb_convert_case($string, MB_CASE_LOWER, "UTF-8");
  return $vystup;
}

/* vraci pole tokenu */
function tokenize($string) {
  
    
    /* odstraneni balastu */
  $string = str_replace("'","",$string,$i);
  $string = str_replace("|","",$string,$i);
  $string = str_replace(";","",$string,$i);
  $string = str_replace(",","",$string,$i);
  $string = str_replace("@","",$string,$i);
  $string = str_replace("#","",$string,$i);
  $string = str_replace("~","",$string,$i);
  $string = str_replace("_","",$string,$i);
  $string = str_replace("-","",$string,$i);
  $string = str_replace("+","",$string,$i);
  $string = str_replace(":","",$string,$i);
  $string = str_replace("%","",$string,$i);
  $string = str_replace("^","",$string,$i);
  $string = str_replace("$","",$string,$i);
  $string = str_replace("&","",$string,$i);
  $string = str_replace("¨","",$string,$i);
  $string = str_replace("?","",$string,$i);
  $string = str_replace(".","",$string,$i);
  $string = str_replace("/","",$string,$i);
  $string = str_replace("§","",$string,$i);
  $string = str_replace("*","",$string,$i);
  $string = str_replace("0","ne",$string,$i);
  
  $string = str_replace("  "," ",$string,$i);
    
  $token = strtok($string, " /");
  $i = 0;
  while ($token != false)
    {
    $str[$i] = lowcase($token);
    $token = strtok(" /");
    /*echo "Token $i je $str[$i] <br>";*/
    $i++;
    }
  /*sort($str);*/
  return $str;
 
}

/* vytvoreni vlastniho matchcode */
function mcode($string) {
  
 $abcd = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','$','#');
 $wovels = array('a','e','i','y','o','u');
  
 
 $string=str_replace("y","i",$string);
 /*
 echo "string is: ".$string."\n<br>";
 echo "length is: ".strlen($string)."\n<br>";
 */
 
  /* transform string to array */
  for($a=0;$a<strlen($string);$a++) {
    $st[$a] = substr($string,$a,1);
    
    if ($a>0 and $a <strlen($string)-1) {
      if(in_array($st[$a],$wovels)) {$st[$a]='#';}
    }
    
    echo $st[$a]."|";
  }
  if(in_array($st[0],$wovels)) {$st[0]='$';}
  
  /* sort array */
  $idy=0;
  for ($c=0;$c<count($abcd);$c++) {
    for ($d=0;$d<count($st);$d++) {
      if ($st[$d]==$abcd[$c]) {
        $srtd[$idy] = $st[$d];
        /*
        echo $idy."\n";
        echo $srtd[$idy]."\n";
        */
        $idy++;
      }
    }
  }
  
  /* calculating frequencies */
  $idx = -1;
  for ($b=0;$b<count($srtd);$b++) {
    if ($b>0 && $srtd[$b] == $srtd[$b-1]) {
         $res['frq'][$idx]++;
    }
    else {
      $idx++;
        $res['str'][$idx] = $srtd[$b];
        $res['frq'][$idx] = 1;
    }
    /*
    echo $idx."\n";
    echo $res['str'][$idx]."|".$res['frq'][$idx]."\n";
    */
  }
  
  /* creating output string */
  $result = $st[0];
  for ($d=0;$d<count($res['str']);$d++) {
      if ($res['frq'][$d]>1) {
                 $result = $result."".$res['str'][$d]."".$res['frq'][$d];
      }
      else {
                 $result = $result."".$res['str'][$d];
                
        }
   
    /*echo $result."\n";*/
}
echo "posledni string pripojeny na konec ".$st[strlen($string)-1]."<br>";
$result = $result."".$st[strlen($string)-1];
  return $result;
}

/* vytvari z tokenu vracenych fci tokenize porovnavaci kody */
function matchcode($array,$domType) {
  
  print_r($array);
  
  /* prekodovani fonetik */
  $array = str_replace("pě","pje",$array,$i);
  $array = str_replace("bě","bje",$array,$i);
  $array = str_replace("mě","mne",$array,$i);
  $array = str_replace("vě","vje",$array,$i);
  
   $array = str_replace("q","kv",$array,$i);
  $array = str_replace("pf","f",$array,$i);
  $array = str_replace("th","t",$array,$i);
  
  $array = str_replace("jl","il",$array,$i);
  $array = str_replace("tk","t",$array,$i);
  $array = str_replace("x","ks",$array,$i);
  
  /* zdvojene hlasky */
  $array = str_replace("ss","s",$array,$i);
  $array = str_replace("zz","z",$array,$i);
  $array = str_replace("ee","e",$array,$i);
  $array = str_replace("ff","f",$array,$i);
  $array = str_replace("oo","o",$array,$i);
  $array = str_replace("nn","n",$array,$i);
  $array = str_replace("cc","c",$array,$i);

  /* odstraneni diakritiky a paznaku */
  $array = str_replace("ě","e",$array,$i);
$array = str_replace("é","e",$array,$i);
  $array = str_replace("š","s",$array,$i);
  $array = str_replace("ś","s",$array,$i);
  $array = str_replace("č","c",$array,$i);
    $array = str_replace("ć","c",$array,$i);
  $array = str_replace("ř","r",$array,$i);
    $array = str_replace("ŕ","r",$array,$i);
  $array = str_replace("ž","z",$array,$i);
    $array = str_replace("ź","z",$array,$i);
  $array = str_replace("ý","y",$array,$i);
  $array = str_replace("á","a",$array,$i);
    $array = str_replace("ä","a",$array,$i);
  $array = str_replace("í","i",$array,$i);

  $array = str_replace("ó","o",$array,$i);
    $array = str_replace("ö","o",$array,$i);
  $array = str_replace("ť","t",$array,$i);
  $array = str_replace("ď","d",$array,$i);
  $array = str_replace("ů","u",$array,$i);
  $array = str_replace("ú","u",$array,$i);
  $array = str_replace("ü","u",$array,$i);
  $array = str_replace("ł","l",$array,$i);
  
  $array = str_replace("ň","n",$array,$i);
    $array = str_replace("ń","n",$array,$i);
  $array = str_replace("ľ","l",$array,$i);
    $array = str_replace("ĺ","l",$array,$i);
  
  $array = str_replace("ß","s",$array,$i);
  
  /* obecna pravidla */
  $array = str_replace("y","i",$array,$i);
  $array = str_replace("w","v",$array,$i);

  
  
  /*
   'A','Á',
'A','Ä',
'A','Â',
'A','Ă',
'A','Ą',
'C','Č',
'C','Ć',
'C','Ç',
'D','Ď',
'E','É',
'E','Ě',
'E','Ë',
'I','Í',
'I','Î',
'L','Ľ',
'L','Ĺ',
'L','Ł',
'N','Ň',
'N','Ń',
'O','Ó',
'O','Ö',
'O','Ő',
'O','Ô',
'R','Ř',
'R','Ŕ',
'S','Š',
'S','ß',
'S','Ś',
'S','Ş',
'T','Ť',
'T','Ţ',
'T','¬',
'U','Ú',
'U','Ů',
'U','Ü',
'U','Ű',
'V','W',
'I','Ý',
'I','Y',
'Z','Ž',
'Z','Ź',
'Z','Ż'
  */
  
    print_r($array);
  
  /* pravidla aplikovatelna na cele pole */
  switch ($domType) {
    case "JMENO":
      include "STD_JMENO.inc";
    break;
    case "PRIJM":
      include "STD_PRIJM.inc";
    break;
    case "JMENO_PRIJM":
      include "STD_JMENO.inc";
      include "STD_PRIJM.inc";
    break;
    case "ULICE":
      include "STD_ULICE.inc";
    break;
    case "MISTO":
      
    break;
  }
  
    print_r($array);
  
  $output = '_';
  
  $samohlasky = array('a','e','i','y','o','u');
  $cisla = array('0','1','2','3','4','5','6','7','8','9');
  
     
  for($xx=0;$xx<count($array);$xx++) {
  
    /* pravidla aplikovatelna na jednotlive tokeny */
    switch ($domType) {
      case "PRIJM":
        /* vytvoreni univerzalniho matchcode pro identifikaci domacnosti */
        if (DEBUG == 'Y') {
          echo "token: ".$array[$xx]." \n";
          echo "posledni znak: ".substr($array[$xx],-1,1)." \n";
          echo "posledni dva znaky: ".substr($array[$xx],-2,2)." \n";
          echo "posledni triplet: ".substr($array[$xx],-3,3)." \n";
          echo "ma delku: ".strlen($array[$xx])." \n";
        }
        
        /* vyhozeni ova z zenskeho prijmeni */
        /*
        if (substr($array[$xx],-3,3) == 'ova') {
          $array[$xx] = substr($array[$xx],0,strlen($array[$xx]) - 3);
        }
        */
        
        /* vyporadani se s OV OVA OVOVA */
        /* ostrouchOV, ostrouchOVA, ostrouchOVOVA */
        /*
        if (substr($array[$xx],-2,2) == 'ov') {
          $array[$xx] = substr($array[$xx],0,strlen($array[$xx]) - 2);
        }
        */
        
        /* vyporadani se s vzorem soudce a pan pri presmyckach */
        /* diTE => diTETova, staNEK => staNKova, heriNEK => heriNKova */
        /*
        if (substr($array[$xx],-3,3) == 'tet') {
          $array[$xx] = substr($array[$xx],0,strlen($array[$xx]) - 1);
        }
        else if (substr($array[$xx],-2,2) == 'nk') {
          $array[$xx] = substr($array[$xx],0,strlen($array[$xx]) - 2).'nek';
        }
        */
        
        /* vyhozeni posledni samohlasky */
        /*
        if (in_array(substr($array[$xx],-1,1),$samohlasky)) {
          $array[$xx] = substr($array[$xx],0,strlen($array[$xx]) - 1);
        }
        */
        
        /* vytvoreni vysledneho retezce */
        $mcode[$xx] = md5(mcode($array[$xx]));
            
        
      break;
      case "JMENO":
        /* vytvoreni vysledneho retezce */
        $mcode[$xx] = mcode($array[$xx]);
      break;
      case "ULICE":
        /* metaphone neumi kodovat cisla */
        /* test zda je to numericky atribut */
        if(in_array(substr($item,0,1), $cisla)) {
          /*echo "$item je integer <br>";*/
          $mcode[$xx] = $array[$xx];
        }
        else {
          $mcode[$xx] = mcode($array[$xx]);
        }    
      break;
      case "MISTO":
        /* metaphone neumi kodovat cisla */
        /* test zda je to numericky atribut */
        if(in_array(substr($item,0,1), $cisla)) {
          /*echo "$item je integer <br>";*/
          $mcode[$xx] = $array[$xx];
        }
        else {
          $mcode[$xx] = mcode($array[$xx]);
        }    
      break;
      default;
        $mcode[$xx] = mcode($array[$xx]);
    }
  }
  sort($mcode);
  $output=implode("~",$mcode);
    
  if (DEBUG == 'Y') {echo "Toto je output: $output <br>";}
  
  return $output;
}

function dbConnect($dbms) { 
  switch ($dbms) {
    case "MYSQL":
      $link = mysql_connect(HOST, USER, PASS);
      
      if (!$link) {
      die('Nelze se pripojit: ' . mysql_error());
      }
      
      mysql_select_db(DB);
      
      mysql_query("SET CHARACTER SET utf8");
      mysql_query('SET SESSION wait_timeout = 31536000', $link);
      
      if (DEBUG == 'Y') {
        if(isset($link)) {echo "Uspesne pripojeno k ".HOST." link ID $link <BR>\n";}
      }
      return $link;
    break;
  }
}

function dbClose($dbms,$link) {
  switch ($dbms) {
    case "MYSQL":
      mysql_db_close($link);
    break;
  }
}

function dbQuery($dbms,$qstr) {
  switch ($dbms) {
    case "MYSQL":
      $link = dbConnect($dbms);
      $result = mysql_query($qstr);
      //echo $qstr;
      if (!$result) {
      die('Nelze spustit dotaz:' . mysql_error());
      }
      if (DEBUG == 'Y') {
        echo "Dotaz: $qstr <BR>\n";
        echo "Vysledek dotazu: $result <BR>\n";
      }
      return $result;
      dbClose($dbms,$link);
    break;
  }
}

function iterator($result) {
  $i = 1;
  while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    if ($i == 1) {
      for($k = 1; $k < count($row); $k++) {
        $fname[$k] = mysql_field_name($result, $k);
        echo "$fname[$k] \n<br>";
        /* prirazeni domenoveho typu */
        switch ($fname[$k]) {
          case "mc_prijmeni":
            $domain[$k] = 'PRIJM';
          break;
          case "mc_jmeno":
            $domain[$k] = 'JMENO';
          break;
          case "mc_ulice":
            $domain[$k] = 'ULICE';
          break;
          case "mc_obec":
            $domain[$k] = 'MISTO';
          break;
          case "mcode_1":
            $domain[$k] = 'JMENO_PRIJM';
          break;
          case "mcode_2":
            $domain[$k] = 'JMENO_PRIJM';
          break;
          
        }
      }
    }
    echo $i."|";
    for($j = 1; $j < count($row); $j++) {
       
      if (DEBUG == 'Y') {echo $row[$j]." | ".lowcase($row[$j])."<br>\n";}
        if ($row[$j] != '') {
          /* nastaveni kroku pro jednotlive domenove typy */
          dbQuery(DBMS,"UPDATE ".SRC_TABLE." set ".$fname[$j]."='".matchcode(tokenize($row[$j]),$domain[$j])."', flag = '".$j."' WHERE klic = '".$row[0]."'");
        }
     }
     $i++;
  }
}

function genCluster($dbms) {
  $qstr = "CREATE TABLE proxy AS SELECT *, concat(trim(MC_PRIJMENI),trim(ifnull(MC_ULICE,'')),trim(ifnull(MC_OBEC,''))) AS mcode FROM t_adresa ORDER BY mcode where flag>0";
  dbQuery($dbms,$qstr);

}

function genStat($dbms,$mode,$par) {
  
  switch ($mode) {
    case "start":
      $qstr = "DROP TABLE stat IF EXISTS";
      dbQuery($dbms,$qstr);
  
      $qstr = "CREATE TABLE `DQ`.`stat` (`metric` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_czech_ci NULL ,";
      $qstr.= "`value` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_czech_ci NULL";
      $qstr.= ") ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_czech_ci;)";
      dbQuery($dbms,$qstr);
    break;
    case "add":
      
    break;
    case "end":
      $qstr = "SELECT metric, value FROM stat";
      dbQuery($dbms,$qstr);
      while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
        echo $row[1]."\t".$row[2];
      }
    break;
  }
}

?>
