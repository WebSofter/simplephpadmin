<?php
$fileName = $_REQUEST["fileName"];
//
$fullPath = "./uploads/".$fileName;
//upload/users/xx@xx.xx/userpic
unlink($fullPath);

?>