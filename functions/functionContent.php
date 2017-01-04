<?php
function checkPage($page, $dir) {
  $result = scandir($dir);
  return in_array($page, $result);
}

function displayPage($page) {
  $dir = "./contents/";
  $page .= ".inc.php";
  if (checkPage($page, $dir)) {
    include $dir . $page;
  }
  else {
    include "./common/404.php";
  }
}
