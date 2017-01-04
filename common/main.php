<?php
echo "<h1>Main</h1>";

if (isset ($_REQUEST['page']) && $_REQUEST['page'] != "") {
  $page = $_REQUEST['page'];
}
else {
  $page = "accueil";
}

displayPage($page);
