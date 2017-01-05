<?php

function errorLog($errLog){
  $fp = fopen('log/errLog.txt','a+');
  fseek($fp, 0);
  $date = new DateTime();
  $date = $date -> format("y:m:d - h:i:s : ");
  $nouverr = $errLog."\r\n";
  fwrite($fp, $date);
  fwrite($fp, $nouverr);
  fclose($fp);
}

errorLog("YouHou les Erreurs s'injecte ici mon amis !!");

?>
